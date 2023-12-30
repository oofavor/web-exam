<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Административная панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <?php include("db.php"); ?>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Административная панель</a>
            <a class="navbar-brand" href="#">Доставка еды</a>
        </nav>
    </header>
    <main>
        <!-- Область для всплывающих уведомлений (Alerts) -->
        <div class="container mt-3" id="alerts"></div>

        <div class="container mt-3">
            <form id="searchForm">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">Наименование</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="adminDistrict">Административный округ</label>
                        <select class="form-control" id="adminDistrict" name="adminDistrict">
                            <option value="none">Не выбрано</option>
                            <?php
                            $result = mysqli_query($mysql, "SELECT DISTINCT district FROM `orders`");

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['district'] ?>">
                                    <?php echo $row['district'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="admindistrict">тип объекта</label>
                        <select class="form-control" id="objectType" name="objectType">
                            <option value="none">Не выбрано</option>
                            <?php
                            $result = mysqli_query($mysql, "SELECT DISTINCT objectType FROM `orders`");

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['objectType'] ?>">
                                    <?php echo $row['objectType'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="adminDistrict">Является сетевой</label>
                        <select class="form-control" id="isNet" name="isNet">
                            <option value="none">Не выбрано</option>
                            <?php
                            $result = mysqli_query($mysql, "SELECT DISTINCT isNet FROM `orders`");

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['isNet'] ?>">
                                    <?php echo $row['isNet'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="admindistrict">тип объекта</label>
                        <select class="form-control" id="lgot" name="lgot">
                            <option value="">Не выбрано</option>
                            <?php
                            $result = mysqli_query($mysql, "SELECT DISTINCT lgot FROM `orders`");

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['lgot'] ?>">
                                    <?php echo $row['lgot'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="createdDateFrom">Дата создания с</label>
                        <input type="date" class="form-control" id="createdDateFrom" name="createdDateFrom">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="createdDateTo">Дата создания по</label>
                        <input type="date" class="form-control" id="createdDateTo" name="createdDateTo">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="seatsFrom">Количество посадочных мест от</label>
                        <input type="number" class="form-control" id="seatsFrom" name="seatsFrom" min="0">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="seatsTo">Количество посадочных мест до</label>
                        <input type="number" class="form-control" id="seatsTo" name="seatsTo" min="0">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="searchRecords()">Найти</button>
            </form>
        </div>

        <!-- Таблица с данными о предприятиях общественного питания -->
        <div class="container mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Является сетевым</th>
                        <th scope="col">Вид объекта</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Кол-во мест</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($mysql, "SELECT * FROM `orders`");

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <th>
                                <?php echo $row['id'] ?>
                            </th>
                            <th>
                                <?php echo $row['name'] ?>
                            </th>
                            <th>
                                <?php echo $row['isNet'] ?>
                            </th>
                            <th>
                                <?php echo $row['objectType'] ?>
                            </th>
                            <th>
                                <?php echo $row['address'] ?>
                            </th>
                            <th>
                                <?php echo $row['seats'] ?>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Кнопки для создания и редактирования записей -->
        <div class="container mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Создать запись
            </button>
            <!-- Добавьте здесь кнопки для редактирования записей -->
        </div>

        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="createRecordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createRecordModalLabel">Создание записи</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="createRecordForm">
                            <div class="form-group col-md-12">
                                <label for="name">Наименование</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="adminDistrict">Административный округ</label>
                                <select class="form-control" id="adminDistrict" name="adminDistrict">
                                    <option value="none">Не выбрано</option>
                                    <?php
                                    $result = mysqli_query($mysql, "SELECT DISTINCT district FROM `orders`");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['district'] ?>">
                                            <?php echo $row['district'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="admindistrict">тип объекта</label>
                                <select class="form-control" id="objectType" name="objectType">
                                    <option value="none">Не выбрано</option>
                                    <?php
                                    $result = mysqli_query($mysql, "SELECT DISTINCT objectType FROM `orders`");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['objectType'] ?>">
                                            <?php echo $row['objectType'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="adminDistrict">Является сетевой</label>
                                <select class="form-control" id="isNet" name="isNet">
                                    <option value="none">Не выбрано</option>
                                    <?php
                                    $result = mysqli_query($mysql, "SELECT DISTINCT isNet FROM `orders`");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['isNet'] ?>">
                                            <?php echo $row['isNet'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="admindistrict">тип объекта</label>
                                <select class="form-control" id="lgot" name="lgot">
                                    <option value="">Не выбрано</option>
                                    <?php
                                    $result = mysqli_query($mysql, "SELECT DISTINCT lgot FROM `orders`");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row['lgot'] ?>">
                                            <?php echo $row['lgot'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="submitCreateRecordForm()">Создать
                                запись</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav class="container mt-3">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Назад</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Вперед</a></li>
            </ul>
        </nav>
    </main>
    <!-- Нижняя часть сайта (Footer) -->
    <footer class="footer mt-3">
        <div class="container">
            <p>Информация о компании и контакты:</p>
            <p>OOO Хорошая доставка еды</p>
            <p>Телефон: +77777777</p>
            <p>Почта: example@gmail.com</p>
        </div>
    </footer>

    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>