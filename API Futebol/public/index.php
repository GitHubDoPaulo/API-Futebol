<?php
require_once '../controller/matchesController.php';

$competitionId = $_GET['competition'] ?? 'PL';
$teamId = $_GET['team'] ?? '';

$controller = new MatchesController();
$data = $controller->getMatches($competitionId, $teamId);

$upcomingMatches = $data['upcomingMatches'];
$pastMatches = $data['pastMatches'];

require_once '../view/index.php';
?>
