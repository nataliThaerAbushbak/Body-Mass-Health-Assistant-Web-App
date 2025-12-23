<?php
declare(strict_types=1);
session_start();

function bmi_category(float $bmi): string {
  if ($bmi < 18.5) return 'Underweight';
  if ($bmi < 25.0) return 'Normal';
  if ($bmi < 30.0) return 'Overweight';
  return 'Obese';
}

$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $weight = isset($_POST['weight']) ? (float)$_POST['weight'] : 0.0;
  $heightCm = isset($_POST['height']) ? (float)$_POST['height'] : 0.0;

  if ($weight <= 0 || $heightCm <= 0) {
    $err = 'Please enter valid weight and height.';
  } else {
    $heightM = $heightCm / 100.0;
    $bmi = $weight / ($heightM * $heightM);
    $_SESSION['bmi'] = round($bmi, 1);
    $_SESSION['category'] = bmi_category($bmi);
    // ما بنحدد goal هنا، بس نخليه لصفحة apps
  }
}

$bmi = $_SESSION['bmi'] ?? null;
$category = $_SESSION['category'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BMI</title>
  <link rel="stylesheet" href="web/style.css">
</head>
<body>
  <main class="shell">
    <section class="panel">
      <header class="header">
        <img class="kitty" src="web/assets/hello-kitty.png" alt="Hello Kitty">
        <h1 class="title">BMI</h1>
        <p class="subtitle">A gentle, supportive space — no judging 💗</p>
      </header>

      <form class="form" method="POST" action="">
        <div class="field">
          <label for="weight">Weight (kg)</label>
          <input id="weight" name="weight" type="number" step="0.1" min="1" max="500" required>
        </div>

        <div class="field">
          <label for="height">Height (cm)</label>
          <input id="height" name="height" type="number" step="0.1" min="30" max="250" required>
        </div>

        <!-- ✅ زر ستايله رح يشتغل لأن عليه class="btn" -->
        <button class="btn" type="submit">Calculate</button>
      </form>

      <?php if ($err): ?>
        <div class="result error"><?= htmlspecialchars($err) ?></div>
      <?php endif; ?>

      <?php if ($bmi !== null && $category !== null): ?>
        <div class="result">
          🎀 <strong>Your BMI:</strong> <?= htmlspecialchars((string)$bmi) ?><br>
          💗 <strong>Category:</strong> <?= htmlspecialchars((string)$category) ?><br>
          <span class="tiny muted">Your worth isn’t a number 🤍</span>
        </div>

        <!-- ✅ زر ثاني للـApps screen -->
        <a class="btn ghost" href="apps.php">✨ Help me with my goal</a>
      <?php else: ?>
        <p class="note">This tool is for awareness only, not medical advice 🌸</p>
      <?php endif; ?>

    </section>
  </main>
</body>
</html>
