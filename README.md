
# Sklep Komputerowy - Zaawansowany Projekt Laravel

## O Projekcie

**Sklep Komputerowy** to w pełni funkcjonalna aplikacja e-commerce, stworzona jako kompleksowy projekt demonstrujący zaawansowane możliwości frameworka Laravel. Aplikacja została zbudowana od podstaw, kładąc nacisk na czystą architekturę (MVC z warstwą serwisów), bezpieczeństwo oraz nowoczesny i interaktywny interfejs użytkownika.

Projekt obejmuje zarówno bogatą w funkcje, publiczną część sklepu dla klientów, jak i rozbudowany, bezpieczny panel administratora do zarządzania całym serwisem.

## Kluczowe Funkcjonalności

### Część Publiczna (dla Klientów)

-   **Strona Główna:** Dynamiczna strona z sekcją "Hero", wyszukiwarką, wyróżnionymi kategoriami oraz listą najnowszych i losowo polecanych produktów, które odświeżają się automatycznie.
    
-   **Katalog Produktów:** Przejrzysta lista produktów z zaawansowanymi opcjami wyszukiwania tekstowego i filtrowania po kategoriach.
    
-   **Szczegóły Produktu:** Profesjonalna strona produktu z galerią, szczegółowym opisem, specyfikacją techniczną i sekcją opinii, zorganizowana w interaktywnych zakładkach.
    
-   **System Rejestracji i Logowania:** Pełna obsługa kont użytkowników oparta na pakiecie Laravel Breeze, z rozróżnieniem ról (klient/administrator) i dedykowanymi panelami.
    
-   **Koszyk na Zakupy:** Pełna funkcjonalność koszyka oparta na sesji, z możliwością dodawania, aktualizacji ilości i usuwania produktów.
    
-   **Składanie Zamówień:** Uproszczony proces składania zamówienia, który zapisuje transakcję w bazie danych, aktualizuje stany magazynowe i obsługuje logikę zwrotów przy anulowaniu.
    
-   **Funkcje Interaktywne (AJAX):** Możliwość dodawania produktów do ulubionych i koszyka bez przeładowywania strony, z dynamicznymi powiadomieniami.
    

### Panel Administratora (Intranet)

-   **Profesjonalny Dashboard:** Kokpit z kluczowymi statystykami (liczba produktów, klientów), wykresem sprzedaży z ostatnich 7 dni oraz podglądem najnowszych zamówień i opinii.
    
-   **Zarządzanie Produktami (CRUD):** Pełny system do tworzenia, odczytu, aktualizacji i "miękkiego usuwania" produktów, z paginacją i wyszukiwarką.
    
-   **Zarządzanie Kategoriami (CRUD):** Moduł do zarządzania kategoriami, ich opisami (z edytorem WYSIWYG) oraz ikonami.
    
-   **Zaawansowany System Specyfikacji:** Inteligentny system, w którym atrybuty są ściśle powiązane z kategoriami. Formularz produktu dynamicznie dostosowuje dostępne pola specyfikacji w zależności od wybranej kategorii.
    
-   **Moderacja Opinii:** Panel do przeglądania wszystkich opinii, z możliwością ich ukrywania lub trwałego usuwania.
    
-   **Zarządzanie Zamówieniami:** Lista wszystkich zamówień z filtrowaniem po statusie oraz szczegółowy podgląd każdego zamówienia z opcją zmiany jego statusu.
    

## Technologie i Techniki

-   **Backend:** Laravel, PHP, Architektura MVC z warstwą Serwisów
    
-   **Frontend:** HTML5, CSS3, JavaScript (Vanilla JS), Bootstrap 5, Bootstrap Icons
    
-   **Baza Danych:** MySQL, Eloquent ORM, Transakcje Bazodanowe
    
-   **Kluczowe Koncepcje:** Routing, Middleware, Walidacja, Autentykacja (Laravel Breeze), AJAX (Fetch API), View Composers, "Lazy Loading" obrazów.
    
-   **Narzędzia Zewnętrzne:** Composer, NPM, TinyMCE (edytor WYSIWYG), Chart.js (wykresy).
    

## Instalacja i Uruchomienie

Aby uruchomić projekt lokalnie, postępuj zgodnie z poniższymi krokami:

1.  **Sklonuj repozytorium:**
    
    ```
    git clone [adres-twojego-repozytorium]
    cd [nazwa-folderu]
    
    ```
    
2.  **Zainstaluj zależności PHP:**
    
    ```
    composer install
    
    ```
    
3.  **Zainstaluj zależności JavaScript:**
    
    ```
    npm install
    
    ```
    
4.  **Skonfiguruj plik środowiskowy:**
    
    -   Skopiuj plik `.env.example` i zmień jego nazwę na `.env`.
        
    -   W pliku `.env` uzupełnij dane dostępowe do Twojej lokalnej bazy danych.
        
    
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=SklepKomputerowy
    DB_USERNAME=root
    DB_PASSWORD=
    
    ```
    
5.  **Wygeneruj klucz aplikacji:**
    
    ```
    php artisan key:generate
    
    ```
    
6.  **Zaimportuj bazę danych:**
    
    -   Stwórz pustą bazę danych o nazwie, którą podałeś w pliku `.env` (np. `SklepKomputerowy`).
        
    -   Zaimportuj do niej strukturę i dane z dołączonego pliku `database_backup/SklepKomputerowy.sql`.
        
7.  **Uruchom migracje Laravela:**
    
    -   Ta komenda stworzy tabele potrzebne do działania wewnętrznych systemów Laravela (sesje itp.).
        
    
    ```
    php artisan migrate
    
    ```
    
8.  **Skompiluj zasoby frontendu:**
    
    ```
    npm run dev
    
    ```
    
9.  **Uruchom serwer deweloperski:**
    
    -   W osobnym oknie terminala wykonaj komendę:
        
    
    ```
    php artisan serve
    
    ```
    

Aplikacja będzie dostępna pod adresem `http://127.0.0.1:8000`.

### Dane Logowania Administratora
-   **Email:**  `admin@gmail.com`
-   **Hasło:**  `admin123`

### Dane Logowania Użytkownika
-   **Email:**  `uzytkownik@gmail.com`
-   **Hasło:**  `uzytkownik`
