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
  public function projectDelete(Project $project)
  {
    $project->delete();

    return redirect()->route('home');
  }

  // show
  public function projectShow(Project $project)
  {
    return view('projectShow', compact('project'));
  }

  // create new proj
  public function projectCreate()
  {
    return view('projectCreate');
  }

  // store
  public function projectStore(Request $request)
  {

    $data = $request->validate([
      'name' => 'unique:projects|string|max:64',
      'description' => 'nullable|string|max:255',
      'main_image' => 'unique:projects|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      'release_date' => 'date',
      'repo_link' => 'unique:projects|string',
    ]);

    $img_path = Storage::put('uploads', $data['main_image']);
    $data['main_image'] = $img_path;

    $project = new Project();

    $project->name = $data['name'];
    $project->description = $data['description'];
    $project->main_image = $data['main_image'];
    $project->release_date = $data['release_date'];
    $project->repo_link = $data['repo_link'];

    $project->save();

    return redirect()->route('home');
  }
}