<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST['title'];
  $poster = $_FILES['poster']['name'];
  $release = $_POST['release'];

  move_uploaded_file($_FILES['poster']['tmp_name'], "assets/posters/" . $poster);

  $stmt = $conn->prepare("INSERT INTO movies (title, poster, release_date) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $title, $poster, $release);
  $stmt->execute();

  echo "Movie added successfully!";
}
?>

<form method="POST" enctype="multipart/form-data">
  Title: <input type="text" name="title" required><br><br>
  Poster: <input type="file" name="poster" required><br><br>
  Release Date: <input type="date" name="release" required><br><br>
  <input type="submit" value="Add Movie">
</form>
