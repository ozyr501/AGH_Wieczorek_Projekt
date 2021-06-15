# AGH_Wieczorek_Projekt
Projekt przygotowany na potrzeby zaliczenia przedmiotu Języki Programowania i Algorytmy 2021

Aby skorzystać z interfejsu REST do walidacji biletu, należy przesłać zapytanie GET, 
zawierające parametr "tn", przechowujący unikatowy numer biletu który chcemy sprawdzić.
Zwróci on nam obiekt typu json, zawierający wszytkie informacje o bilecie.
W przypadku podania niewłaściwego kodu otrzymamy obiekt z wiadomością o braku biletu.

Aby móc zarezerować bilet niezbęne jest bycie zalogowanym. 

Dodatkowo do poprawnego funkcjonowania strony niezbędne jest zaimportowanie dołączonej bazy danych.
Plik kino.sql zawiera wszytkie tabele, które powinny znaleźć się w bazie danych "kino".
Uprawnienia do bazy danych powinno posiadać trzech użytkowników. Wszystkie informacje w pliu users.sql.
