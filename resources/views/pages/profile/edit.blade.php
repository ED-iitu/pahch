@extends('layouts.app')

@section('content')
    <!-- Page Section -->
    <section class="page-section" id="page-section">
        <div class="container">
            <div class="page-header">
                <div class="page-path">
                    <ol>
                        <li><a href="#" class=""><span>Главная</span></a></li>
                        <li><a href="#" class=""><span>Личный кабинет</span></a></li>
                        <li><a href="#" class="path-active"><span>Настройки</span></a></li>
                    </ol>
                </div>
                <h1 class="page-name">Настройки профиля</h1>
            </div>
            <div class="page-content">
                <article class="page-article no-aside">
                    <div class="page-cabinet">
                        <div class="cabinet-card type1">
                            <form class="profile-edit" id="profile-edit">
                                <div class="profile-edit-data">
                                    <label for="" class="profile-avatar">
                                        <input type="file" name="" id="imageUpload" accept="image/*" required="" capture>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.4286 17.8095C19.4286 19.7031 17.8935 21.2381 16 21.2381C14.1065 21.2381 12.5714 19.7031 12.5714 17.8095C12.5714 15.916 14.1065 14.381 16 14.381C17.8935 14.381 19.4286 15.916 19.4286 17.8095Z" fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.14286 6.66669C8.19608 6.66669 7.42857 7.4342 7.42857 8.38097V9.23812C5.53502 9.23812 4 10.7731 4 12.6667V22.9524C4 24.8459 5.53502 26.381 7.42857 26.381H24.5714C26.465 26.381 28 24.8459 28 22.9524V12.6667C28 10.7731 26.465 9.23812 24.5714 9.23812H16V8.38097C16 7.4342 15.2325 6.66669 14.2857 6.66669H9.14286ZM16 22.9524C18.8403 22.9524 21.1429 20.6499 21.1429 17.8095C21.1429 14.9692 18.8403 12.6667 16 12.6667C13.1597 12.6667 10.8571 14.9692 10.8571 17.8095C10.8571 20.6499 13.1597 22.9524 16 22.9524Z" fill="white"/>
                                        </svg>
                                        <img src="../img/img-profile-avatar.png" alt="" class="" id="profileImage">
                                    </label>
                                    <div class="profile-text-inputs">
                                        <label for="">
                                            <span class="profile-input-text-name">ФИО</span>
                                            <input type="text" placeholder="" value="Кани Любовь Ораловна" required>
                                        </label>
                                        <label for="">
                                            <span class="profile-input-text-name">Email</span>
                                            <input type="text" placeholder="" value="omaislove02@gmail.com" required>
                                        </label>
                                        <label for="">
                                            <span class="profile-input-text-name" >Номер телефона</span>
                                            <input type="text" placeholder="" value="7 705 579 79 21" id="input-phone" required>
                                        </label>
                                    </div>
                                </div>
                                <div class="profile-data-submit">
                                    <button class="profile-data-save-btn">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                        <div class="cabinet-card type1">
                            <form class="profile-edit">
                                <h2 class="profile-form-name">Смена пароля</h2>
                                <div class="profile-edit-data">
                                    <div class="profile-text-inputs">
                                        <label for="">
                                            <span class="profile-input-text-name">Старый пароль</span>
                                            <input type="password" placeholder="" required>
                                        </label>
                                        <label for="" class="-extra-label"></label>
                                        <label for="">
                                            <span class="profile-input-text-name">Новый пароль</span>
                                            <input type="password" placeholder="" required>
                                        </label>
                                        <label for="">
                                            <span class="profile-input-text-name">Повторите новый пароль</span>
                                            <input type="password" placeholder="" required>
                                        </label>
                                    </div>
                                </div>
                                <div class="profile-data-submit">
                                    <button class="profile-data-save-btn">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection