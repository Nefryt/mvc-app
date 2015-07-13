function getAlert(code) {

    switch(code)    {
        case 1: alertify.success("Zalogowano");
            break;
        case 2: alertify.error("Błąd podczas logowania");
            break;
        case 3: alertify.success("Wylogowano");
            break;
        case 4: alertify.success("Konto zostało utworzone!");
            break;
        case 5: alertify.success("Błąd");
            break;
        case 6: alertify.success("Samochód został zmodyfikowany");
            break;
        case 7: alertify.success("Samochód został usunięty");
            break;
        case 8: alertify.success("Samochód został pomyślnie dodany");
            break;
        case 9: alertify.success("Marka dodana do bazy");
            break;
        case 10: alertify.success("Marka usunięta z bazy");
            break;
        default:
            break;
    }

}