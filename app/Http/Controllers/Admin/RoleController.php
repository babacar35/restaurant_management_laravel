<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('users')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Génération automatique du slug à partir du nom
        ]);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rôle créé avec succès.');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        Log::info('Mise à jour du rôle', [
            'role_id' => $role->id,
            'request_data' => $request->all()
        ]);

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            // Empêcher la modification des rôles système
            if (in_array($role->slug, ['admin', 'manager', 'staff', 'client'])) {
                return back()->with('error', 'Impossible de modifier un rôle système.');
            }

            // Générer le slug à partir du nom si non fourni
            $slug = $request->filled('slug') ? $request->slug : Str::slug($request->name);

            $role->update([
                'name' => $request->name,
                'slug' => $slug,
            ]);

            Log::info('Rôle mis à jour avec succès', ['role_id' => $role->id]);

            return redirect()->route('admin.roles.index')
                ->with('success', 'Rôle mis à jour avec succès.');

        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du rôle', [
                'role_id' => $role->id,
                'error' => $e->getMessage()
            ]);

            return back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour du rôle.')
                ->withInput();
        }
    }

    public function destroy(Role $role)
    {
        // Vérifier si le rôle a des utilisateurs
        if ($role->users()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer un rôle qui a des utilisateurs associés.');
        }

        // Empêcher la suppression des rôles système
        if (in_array($role->slug, ['admin', 'manager', 'staff', 'client'])) {
            return back()->with('error', 'Impossible de supprimer un rôle système.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rôle supprimé avec succès.');
    }
}
