<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style> {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.profile-container {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
}

.profile-picture {
    margin-bottom: 20px;
}

.profile-picture img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 2px solid #ddd;
}

.profile-info {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.profile-item {
    background-color: pink;
    padding: 10px;
    margin: 5px 0;
    width: 100%;
    border-radius: 5px;
}

.profile-item span {
    font-weight: bold;
}
</style>


</head>
<body>
<div class="profile-container">
        <div class="profile-picture">
            <img src="/assets/img/fotoProfilPink.jpeg" alt="Profile Picture">
        </div>
        <div class="profile-info">
            <div class="profile-item">
                <span></span> {{ $nama }}
            </div>
            <div class="profile-item">
                <span></span> {{ $kelas }}
            </div>
            <div class="profile-item">
                <span></span> {{ $npm }}
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>