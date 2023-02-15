<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class MainController extends Controller
{
  // home
  public function home()
  {
    $projects = Project::orderBy('created_at', 'DESC')->get();
    ;
    return view('home', compact('projects'));
  }

  // solo admin
  public function private ()
  {
    $projects = Project::orderBy('created_at', 'DESC')->get();
    return view('private', compact('projects'));
  }

  // delete
  public function delete(Project $project)
  {
    $project->delete();

    return redirect()->route('home');
  }

  // show
  public function show(Project $project)
  {
    return view('projectShow', compact('project'));
  }

  // create new proj
  public function create()
  {
    return view('project.create');
  }

  // store
  public function store(Request $request)
  {

    $data = $request->validate([
      'name' => 'required|string|min:3|max:64|unique:projects,name',
      'description' => 'nullable|string',
      'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      'release_date' => 'required|date|before:today',
      'repo_link' => 'required|string|unique:projects,repo_link',
    ]);

    $img_path = Storage::put('uploads', $data['main_image']);
    $data['main_image'] = $img_path;

    $project = Project::create($data);

    return redirect()->route('home', $project);
  }

  // edit
  public function edit(Project $project)
  {
    return view('project.edit', compact('project'));
  }

  // update
  public function update(Request $request, Project $project)
  {

    $data = $request->validate([
      'name' => 'required|string|min:3|max:64|unique:projects,name,' . $project->id,
      'description' => 'nullable|string',
      'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      'release_date' => 'required|date|before:today',
      'repo_link' => 'required|string|unique:projects,repo_link,' . $project->id,
    ]);

    $img_path = Storage::put('uploads', $data['main_image']);
    $data['main_image'] = $img_path;

    $project->update($data);
    $project->save();

    return redirect()->route('home', $project);
  }
}