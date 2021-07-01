<?php
require "includes/db.php";

$project_id = $_GET['id'];
$user_id = $_COOKIE['id'];

$project = R::load('projects', $project_id);
$members = explode(',',  filter_var(trim($project['members_project']), FILTER_SANITIZE_STRING));

foreach ($members as $key => $member) {
    if ($member == $user_id) {
        unset($members[$key]);
    }
}

$project->members_project = implode(',', $members);
R::store($project);
R::close();
header("Location: ../profile");



?>