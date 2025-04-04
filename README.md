
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
# Navigacja

[-] Na każdej stronie zawarty jest boczny pasek nawigacyjny, który ułatwia poruszanie się po stronie

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/nav/main.png?raw=true)

[-] Jest on zawierany w kodzie przy pomocy injekcji pliku php

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/nav/code1.png?raw=true)

[-] Część struktury nawigacji

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/nav/code2.png?raw=true)

[-] Importowanie plików

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/nav/code3.png?raw=true)
# Strona Główna

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/feed/main.png?raw=true)

[-] Strona główna zawiera funkcjonalność:
- Wyświetlanie postów
- Losowy cytat pobierany z lokalnego pliku JSON

## Post

[-] Struktura pojedyńczego postu
- wyświetlanie nazwy autora postu
- możliwość polajkowania postu
- możliwość usunięcia postu (tylko dla autora)
- tytuł postu
- zawartośc postu
- pełna ilość lajków

[-] Część struktury postu

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/feed/code1.png?raw=true)

[-] System lajkowania jest stworzony przy pomocy technologii AJAX

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/feed/code2.png?raw=true)

[-] Usuwanie postu

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/feed/code3.png?raw=true)
# Wyszukiwanie

[-] Strona wyszukiwania zawiera pole tekstowe, za pomocą którego można wyszukiwać użytkowników wraz z ich bio oraz ich obserwować. Wyszukiwanie nie uwzględnia własnego profilu

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/search/main.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/search/code1.png?raw=true)

[-] Wyszukiwanie oraz obserwowanie jest wykonywane za pomocą PHP, SQL oraz AJAX

- Wyszukiwanie:

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/search/code2.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/search/code3.png?raw=true)

- Obserwowanie:

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/search/code4.png?raw=true)





# Powiadomienia

[-] Ta strona zawiera wszystkie powiadomienia dotyczące osób, które cię obserwują. Jeśli któreś nie zostało odczytane, będzie miało czerwoną kropkę w prawym górnym rogu, sygnalizując nowość.

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/notify/main.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/notify/code1.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/notify/code4.png?raw=true)

[-] Na górze strony jest przycism "Read All", który odczytuje wszystkie powiadomienia za pomocą technologii AJAX oraz PHP

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/notify/code3.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/notify/code2.png?raw=true)


# Tworzenie postów

[-] Kiedy naciśniemy na przycisk od tworzenia posta, otwiera się okienko modal, za pomocą którego możemy wpisać tytuł oraz zawartość posta. Walidacja jest na podstawie pola 'required'

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/cr/main.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/cr/code1.png?raw=true)

[-] System postowania stworzony przy użyciu PHP

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/cr/code2.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/cr/code3.png?raw=true)




# Ustawienia Konta

[-] Strona składa się z dwóch rozwijanych sekcji "User Information" oraz "Privacy", które zawierają ustawienia z ich dziedzin. 

[x] Sekcja Privacy nie ma narazie żadnych ustawień [x]

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/settings/main.png?raw=true)

[-] Sekcja User Information zawiera 2 ustawienia: "username" oraz "bio", gdzie bio można poprostu zostawić puste, a username musi być unikalne oraz nie puste

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/settings/code1.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/settings/code2.png?raw=true)

[-] Na górze strony jest przycisk "Save changes", który waliduje pola oraz zapisuje zmiany w bazie danych za pomocą AJAX i PHP

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/settings/code3.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/settings/code4.png?raw=true)





# Logout

[-] Na samym dole paska nawigacji jest przycisk logout, który wylogowywuje użytkownika oraz usuwa sesję z bazy danych

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/logout/main.png?raw=true)

[-] Wylogowanie jest robione poprzez prosty skrypt w PHP

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/logout/code1.png?raw=true)



# Tryb Ciemny

[-] Tryb ciemny nie jest skończony, lecz częściowo działa. Na dole pasku nawigacyjnege jest slider "Dark Mode", który zmienai tryb z jasnego na ciemny i vice versa

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/dm/main.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/dm/main2.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/dm/code1.png?raw=true)

![alt text](https://github.com/Kubenek/SocialBook/blob/master/images/readme/dm/code2.png?raw=true)


