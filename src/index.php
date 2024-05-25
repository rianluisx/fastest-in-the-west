<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fastest in the West</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/buttons.css" />
  </head>

  <body>
    <div class="user-options">
      <img src="../logo/fastest.png" alt="logo">
      <div class="header">
        <h1>Fastest in the West</h1>
        <p>a fast food restaurant system</p>
      </div>
      <br/>
      <form action="../views/customer-view.php" method="post">
        <button type="submit">Order</button>
      </form>
      <br/>
      <form action="../views/manage-order-view.php" method="post">
        <button type="submit">Manage Order</button>
      </form>
      <br />
      <form action="../views/manage-menu-view.php" method="post">
        <button type="submit">Manage Menu</button>
      </form>
    </div>

  </body>
</html>
