
# SocialBook - PL Documentation

Aplikacja przeglądarkowa social media, zbudowana na podstawie technologii: 

- HTML
- CSS
- JavaScript & AJAX
- PHP
- JSON
- SQL


Zbudowana przy użyciu narzędzi VS Code, XAMPP i phpMyAdmin

----






## Funkcjonalność

# Logowanie

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/login/main.png?raw=true)

[-] Strona logowanie posiada pola Username i Password, za pomocą których możemy zalogować się na stronę.
Logowanie zawiera walidację pól oraz jest asynchroniczne dzięki technologii AJAX oraz PHP.

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/login/code1.png?raw=true)

[-] Kod wysyła zapytanie SQL do bazy danych, tworząc nową sesję oraz zalogowując użytkownika. Po sukcesywnym wykonaniu zapytania tworzy się rekord w bazie danych z odpowiadającym id sesji przeglądarki.

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/login/code2.png?raw=true)

[-] Jeśli jest już użytkownik zalogowany, to zamiast włączać stronę do logowania, automatycznie go przekierowuje na stronę główną.

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/login/code3.png?raw=true)



# Tworzenie Konta

[-] Jeśli użytkownik nie ma konta, może je stworzyć, wchodząc w link na stronie login.php w prawym dolnym rogu. Przekierowuje to użytkownika na stronę account_creation.php

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/accr/main.png?raw=true)

[-] Tak jak login.php, ta strona jest również stworzona przy pomocy technologii AJAX oraz zawiera walidację pól

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/accr/code1.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/accr/code2.png?raw=true)

[-] Po sukcesywnym stworzeniu konta, rekord zostaje dodany do bazy danych, hasło poprawnie zahashowanie, a użytkownika przekierowuje na stronę logowania

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/accr/code3.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/accr/code4.png?raw=true)
# Strona Główna

