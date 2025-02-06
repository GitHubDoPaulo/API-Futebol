<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Jogos de Futebol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function toggleCompetitionSelect() {
            var teamId = document.querySelector("input[name='team']").value;
            var competitionSelect = document.querySelector("select[name='competition']");
            var infoMessage = document.getElementById("competitionInfoMessage");

            if (teamId === "") {
                competitionSelect.disabled = false;
                infoMessage.style.display = 'none';
            } else {
                competitionSelect.disabled = true;
                infoMessage.style.display = 'block';
            }
        }

        window.onload = function() {
            toggleCompetitionSelect();
        };
    </script>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Jogos de Futebol</h1>
    <form method="GET" action="">
        <div class="row">
            <div class="col-md-6">
                <label>Escolha um Campeonato:</label>
                <select name="competition" class="form-control" <?= $teamId ? 'disabled' : '' ?>>
                    <option value="PL" <?= $competitionId == 'PL' && !$teamId ? 'selected' : '' ?>>Premier League</option>
                    <option value="CL" <?= $competitionId == 'CL' && !$teamId ? 'selected' : '' ?>>Champions League</option>
                    <option value="BL1" <?= $competitionId == 'BL1' && !$teamId ? 'selected' : '' ?>>Bundesliga</option>
                </select>
                <p id="competitionInfoMessage" class="alert alert-info mt-2" style="display:none;">
                    Se você quiser buscar por um campeonato, apague o ID do time e escolha um campeonato.
                </p>
            </div>
            <div class="col-md-6">
                <label>Buscar por Time (ID):</label>
                <input type="number" name="team" class="form-control" placeholder="Digite o ID do Time" value="<?= $teamId ?>" oninput="toggleCompetitionSelect()">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Buscar</button>
    </form>

    <div class="row mt-4">
        <div class="col-md-6">
            <h2>Próximos Jogos (Próximos 30 dias)</h2>
            <?php if (isset($upcomingMatches['error'])): ?>
                <p class='alert alert-danger'><?= $upcomingMatches['error'] ?></p>
            <?php elseif (empty($upcomingMatches['matches'])): ?>
                <p class='alert alert-warning'>Nenhum próximo jogo encontrado.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Mandante</th>
                            <th>Visitante</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($upcomingMatches['matches'] as $game): ?>
                            <tr>
                                <?php 
                                $homeTeam = $game['homeTeam']['name'] ?? 'Desconhecido';
                                $awayTeam = $game['awayTeam']['name'] ?? 'Desconhecido';
                                $date = $game['utcDate'] ?? 'Data não disponível';
                                ?>
                                <td><?= $homeTeam ?></td>
                                <td><?= $awayTeam ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($date)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <div class="col-md-6">
            <h2>Últimos Resultados (Últimos 30 dias)</h2>
            <?php if (isset($pastMatches['error'])): ?>
                <p class='alert alert-danger'><?= $pastMatches['error'] ?></p>
            <?php elseif (empty($pastMatches['matches'])): ?>
                <p class='alert alert-warning'>Nenhum resultado encontrado para o time nos últimos 30 dias.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Mandante</th>
                            <th>Placar</th>
                            <th>Visitante</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pastMatches['matches'] as $game): ?>
                            <tr>
                                <?php 
                                $homeTeam = $game['homeTeam']['name'] ?? 'Desconhecido';
                                $awayTeam = $game['awayTeam']['name'] ?? 'Desconhecido';
                                $scoreHome = $game['score']['fullTime']['homeTeam'] ?? 0;
                                $scoreAway = $game['score']['fullTime']['awayTeam'] ?? 0;
                                $date = $game['utcDate'] ?? 'Data não disponível';
                                ?>
                                <td><?= $homeTeam ?></td>
                                <td><?= $scoreHome ?> x <?= $scoreAway ?></td>
                                <td><?= $awayTeam ?></td>
                                <td><?= date('d/m/Y', strtotime($date)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
