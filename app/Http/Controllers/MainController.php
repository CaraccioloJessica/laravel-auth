<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class MainController extends Controller
{
  public function home()
  {
    $projects = Project::all();
    return view('home', compact('projects'));
  }

  // solo admin
  public function private ()
  {
    return view('private');
  }

  // show
  public function projectShow(Project $project)
  {
    return view('projectShow', compact('project'));
  }
}