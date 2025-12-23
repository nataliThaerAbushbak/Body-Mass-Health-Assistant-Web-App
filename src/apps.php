<?php
session_start();

function h(string $s): string {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$bmi = $_SESSION['bmi'] ?? null;
$category = $_SESSION['category'] ?? null;

if ($bmi === null || $category === null) {
  header("Location: index.php");
  exit;
}

/* Save goal */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goal'])) {
  $g = strtolower(trim((string)$_POST['goal']));
  if (in_array($g, ['lose','gain'], true)) {
    $_SESSION['goal'] = $g;
  }
}
$goal = $_SESSION['goal'] ?? 'lose';

/* Social platforms (emoji icons) */
$socialPlatforms = [
  'instagram' => ['label' => 'Instagram', 'icon' => '📷'],
  'tiktok'    => ['label' => 'TikTok',    'icon' => '🎵'],
  'youtube'   => ['label' => 'YouTube',   'icon' => '▶️'],
];

/* Selected platform */
$platform = strtolower((string)($_GET['platform'] ?? ''));
if (!array_key_exists($platform, $socialPlatforms)) $platform = '';

/* REAL influencer accounts */
$influencers = [
  'lose' => [
    'instagram' => [
      ['name'=>'Abbey Sharp','handle'=>'@abbeyskitchen','note'=>'RD – balanced & realistic','url'=>'https://www.instagram.com/abbeyskitchen/'],
      ['name'=>'Colleen Christensen','handle'=>'@no.food.rules','note'=>'healthy mindset','url'=>'https://www.instagram.com/no.food.rules/'],
      ['name'=>'Jessica Knurick','handle'=>'@drjessicaknurick','note'=>'evidence-based','url'=>'https://www.instagram.com/drjessicaknurick/'],
    ],
    'tiktok' => [
      ['name'=>'Abbey Sharp','handle'=>'@abbeyskitchen','note'=>'dietitian tips','url'=>'https://www.tiktok.com/@abbeyskitchen'],
      ['name'=>'Milo Wolf','handle'=>'@milowolfnutrition','note'=>'science-based','url'=>'https://www.tiktok.com/@milowolfnutrition'],
      ['name'=>'Dr. Idz','handle'=>'@dridz','note'=>'medical science','url'=>'https://www.tiktok.com/@dridz'],
    ],
    'youtube' => [
      ['name'=>'Abbey’s Kitchen','handle'=>'@AbbeysKitchen','note'=>'nutrition education','url'=>'https://www.youtube.com/@AbbeysKitchen'],
      ['name'=>'Natacha Océane','handle'=>'@NatachaOceane','note'=>'fitness science','url'=>'https://www.youtube.com/@NatachaOceane'],
      ['name'=>'Jeff Nippard','handle'=>'@JeffNippard','note'=>'training science','url'=>'https://www.youtube.com/@JeffNippard'],
    ],
  ],

  'gain' => [
    'instagram' => [
      ['name'=>'Jeff Nippard','handle'=>'@jeffnippard','note'=>'strength training','url'=>'https://www.instagram.com/jeffnippard/'],
      ['name'=>'Sohee Lee','handle'=>'@soheefit','note'=>'strength + habits','url'=>'https://www.instagram.com/soheefit/'],
      ['name'=>'Natacha Océane','handle'=>'@natachaoceane','note'=>'science-based','url'=>'https://www.instagram.com/natachaoceane/'],
    ],
    'tiktok' => [
      ['name'=>'Jeff Nippard','handle'=>'@jeffnippard','note'=>'strength tips','url'=>'https://www.tiktok.com/@jeffnippard'],
      ['name'=>'Sohee Lee','handle'=>'@soheefit','note'=>'balanced strength','url'=>'https://www.tiktok.com/@soheefit'],
      ['name'=>'Natacha Océane','handle'=>'@natachaoceane','note'=>'fitness science','url'=>'https://www.tiktok.com/@natachaoceane'],
    ],
    'youtube' => [
      ['name'=>'Jeff Nippard','handle'=>'@JeffNippard','note'=>'hypertrophy','url'=>'https://www.youtube.com/@JeffNippard'],
      ['name'=>'Jeremy Ethier','handle'=>'@JeremyEthier','note'=>'science workouts','url'=>'https://www.youtube.com/@JeremyEthier'],
      ['name'=>'ATHLEAN-X','handle'=>'@ATHLEANX','note'=>'training mechanics','url'=>'https://www.youtube.com/@ATHLEANX'],
    ],
  ],
];

/* Apps on store */
$storeApps = [
  'lose' => [
    ['icon'=>'🍓','name'=>'MyFitnessPal','desc'=>'food tracking'],
    ['icon'=>'👟','name'=>'Strava','desc'=>'walking & running'],
    ['icon'=>'🧘‍♀️','name'=>'Nike Training Club','desc'=>'guided workouts'],
  ],
  'gain' => [
    ['icon'=>'💪','name'=>'Strong','desc'=>'strength logging'],
    ['icon'=>'🏋️‍♀️','name'=>'Fitbod','desc'=>'workout planning'],
    ['icon'=>'🥑','name'=>'Cronometer','desc'=>'nutrition tracking'],
  ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BMI</title>
  <link rel="stylesheet" href="web/style.css">
</head>
<body>

<main class="shell">
<section class="panel wide">

<header class="header">
  <img class="kitty" src="web/assets/hello-kitty.png" alt="Hello Kitty">
  <h1 class="title">Apps can help you achieve your goal</h1>
  <p class="subtitle">Support first. Pressure never 💗</p>
</header>

<div class="result">
  🎀 <strong>Your BMI:</strong> <?= h((string)$bmi) ?><br>
  💗 <strong>Category:</strong> <?= h((string)$category) ?><br>
  <span class="tiny muted">Current goal: <strong><?= h($goal) ?></strong></span>
</div>

<div class="section">
  <h2 class="section-title">Pick your goal</h2>
  <form class="goalPick" method="POST">
    <button class="btn ghost" name="goal" value="lose">💖 Feel lighter</button>
    <button class="btn ghost" name="goal" value="gain">🌸 Feel stronger</button>
  </form>
</div>

<div class="section">
  <h2 class="section-title">Social</h2>

  <div class="icon-grid">
    <?php foreach ($socialPlatforms as $key => $p): ?>
      <a class="icon-link <?= ($platform === $key ? 'active' : '') ?>"
         href="?platform=<?= h($key) ?>">
        <div class="icon"><?= h($p['icon']) ?></div>
        <div class="icon-label"><?= h($p['label']) ?></div>
      </a>
    <?php endforeach; ?>
  </div>

  <?php if ($platform): ?>
    <div class="app-card">
      <ul>
        <?php foreach ($influencers[$goal][$platform] as $inf): ?>
          <li>
            🌷 <a href="<?= h($inf['url']) ?>" target="_blank">
              <strong><?= h($inf['name']) ?></strong>
            </a>
            <span class="tiny muted"> — <?= h($inf['note']) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
</div>

<div class="section">
  <h2 class="section-title">Apps on the store</h2>
  <?php foreach ($storeApps[$goal] as $app): ?>
    <div class="app-card">
      <strong><?= h($app['icon']) ?> <?= h($app['name']) ?></strong>
      <div class="tiny muted"><?= h($app['desc']) ?></div>
    </div>
  <?php endforeach; ?>
</div>

<div class="actions">
  <a class="btn" href="index.php">⬅ Back to BMI</a>
</div>

</section>
</main>

</body>
</html>
