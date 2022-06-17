<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>registration</title>
</head>
<body>
    <div class="grid_wrap">
    <!-- --------------------------- wrap content ------------------------------ -->
        <div class="wrap_content">
            <!-- --------------------------------------------------------- -->
            <p class="h1">Регистрация</p>
            <!-- ----------------- The form of authorisation ----------------- -->
            <form action="#" method="post">
            <!-- ----------------- MAIN BLOCK of fields ----------------- -->
                <div class="main_blockFields">
                    <!-- ----------------- first block Fields ----------------- -->
                    <div class="first_blockFields">
                        <div class="block_legalPerson">
                            <label for="label_legalPerson">Название Юр. Лица</label>
                            <input type="text" maxlength="11" id="label_legalPerson" name="label_legalPerson" placeholder="ООО 'Наименование'" autocomplete="current-password">
                        </div>            
                        <div class="block_inn">
                            <label for="label_inn">ИНН Юр. Лица</label>
                            <input type="text" maxlength="12" id="label_inn" name="label_inn" placeholder="6598*******8" autocomplete="current-password">
                        </div>
                        <div class="block_contactPerson">
                            <label for="label_contactPerson">Контактное лицо</label>
                            <input type="text" id="label_contactPerson" name="label_contactPerson" placeholder="Иван Николаевич Куприн" autocomplete="current-password">
                        </div>
                        <div class="block_division">
                            <label for="label_division">Подразделение</label>
                            <input type="text" id="label_division" name="label_division" placeholder="Главный отдел" autocomplete="current-password">
                        </div>
                        <div class="block_telephone">
                            <label for="label_telephone">Номер телефона для связи <span class="red_text">*</span></label>
                            <input type="tel" id="label_telephone" name="label_telephone" placeholder="+7(***)***-**-**" autocomplete="current-password">
                        </div>

                    </div>
                    <!-- ---------------------------------------------------------------------- -->
                    
                    <!-- ----------------- second block Fields ----------------- -->
                    <div class="second_blockFields">
                        <div class="block_email">
                            <label for="label_email">Электронная почта</label>
                            <input type="email" id="label_email" name="label_email" placeholder="email@gmail.com" autocomplete="current-password">
                        </div>
                        <div class="block_actualAddress">
                            <label for="label_actualAddress">Фактический адрес</label>
                            <input type="text" id="label_actualAddress" name="label_actualAddress" placeholder="Введите адрес" autocomplete="current-password">
                        </div>
                        <div class="block_password">
                            <label for="label_password">Пароль <span class="red_text">*</span></label>
                            <input type="password" id="label_password" name="label_password" placeholder="NewUser15896Okay" autocomplete="current-password">
                        </div>
                        <div class="block_repeatPassword">
                            <label for="label_repeatPassword">Повторите пароль <span class="red_text">*</span></label>
                            <input type="password" id="label_repeatPassword" name="label_repeatPassword" placeholder="NewUser15896Okay" autocomplete="current-password">
                        </div>
                    </div>        
                </div>                  
                <!-- ---------------------------------------------------------------------- -->
                
                <!-- ----------------- Login button ----------------- -->
                <div class="signUp_errorMessage">
                    <div class="log_in">
                        <input type="submit" class="button_log_in" value="Зарегистрироваться">
                        <p class="sign_in">У Вас есть личный кабинет? <a href="#" class="link_sign_up link">Войти</a></p>
                    </div>
                    <div class="error_message">
                        <!-- Add an error message with help of removing the class ".none_visible" at tag <p>-->
                        <p class="none_visible">lorem ipsum</p>
                    </div>
                </div>
                
            </form>
            <!-- ------------------------------------------------------------------------------------- -->
        </div>
    </div>


</body>
</html>