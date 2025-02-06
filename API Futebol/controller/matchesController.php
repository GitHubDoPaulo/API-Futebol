<?php
require_once '../model/FootballAPI.php';

class MatchesController {
    private $api;

    public function __construct() {
        $this->api = new FootballAPI();
    }

    public function getMatches($competitionId = 'PL', $teamId = '') {
        $dataInicio = date('Y-m-d', strtotime('-30 days'));
        $dataFim = date('Y-m-d', strtotime('+30 days'));
        $dataHoje = date('Y-m-d');
        $competitionData = $this->api->fetchFromAPI("competitions/$competitionId");
        $currentMatchday = $competitionData['currentSeason']['currentMatchday'] ?? null;
        $nextMatchday = $currentMatchday ? $currentMatchday + 1 : null;



        if (!empty($teamId)) {
            $upcomingMatches = $this->api->fetchFromAPI("teams/$teamId/matches?dateFrom=$dataHoje&dateTo=$dataFim&limit=6");
            $pastMatches = $this->api->fetchFromAPI("teams/$teamId/matches?dateFrom=$dataInicio&dateTo=$dataHoje&limit=10");
        } else {
            $upcomingMatches = $this->api->fetchFromAPI("competitions/$competitionId/matches?matchday=$nextMatchday");
            $pastMatches = $this->api->fetchFromAPI("competitions/$competitionId/matches?dateFrom=$dataInicio&dateTo=$dataHoje&limit=10");
        }

        $pastMatches['matches'] = $this->filterPastMatches($pastMatches['matches'] ?? []);

        return ['upcomingMatches' => $upcomingMatches, 'pastMatches' => $pastMatches];
    }

    private function filterPastMatches($matches) {
        $today = date('Y-m-d');
        return array_filter($matches, function ($game) use ($today) {
            return strtotime($game['utcDate']) < strtotime($today);
        });
    }
}
?>
