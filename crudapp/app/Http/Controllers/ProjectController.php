<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::latest()->paginate(5);
        return view('projects.index', compact('projects'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        Project::create($request->all());

        return redirect('/projects')->with('success', 'Project created successfully.');
    }

    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|date',
        ]);

        $project->update($request->all());

        return redirect('/projects')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        
        return redirect('/projects')->with('success', 'Project deleted successfully');
    }
}
