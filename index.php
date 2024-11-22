<body>
  <?php include 'layouts/header.php'; ?>
  <div class="container">
    <h1>Descubra seu signo zodiacal!</h1>
    <hr>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
      <div class="form-group">
        <label for="data_nascimento" class="form-label">
          Digite sua data de nascimento e depois click em Descobrir signo:
        </label>
        <input class="form-control" type="date" id="data_nascimento" name="data_nascimento"
          placeholder="busque seu signo" required>
        <button type="submit" class="btn btn-primary">Descobrir signo</button>
      </div>
    </form>
  </div>
</body>

</html>