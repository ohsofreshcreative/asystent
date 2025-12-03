document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM załadowany. Skrypt gotowy do nasłuchu.'); // SONDA 1

    document.addEventListener('wpcf7mailsent', function(event) {
        console.log('Zdarzenie wpcf7mailsent wykryte!', event.detail); // SONDA 2

        const submittedForm = event.target;
        const step1Container = submittedForm.closest('.cf7-step-1-container');

        if (step1Container) {
            console.log('Formularz z kroku 1 został zidentyfikowany.'); // SONDA 3

            const tabPanel = step1Container.closest('.tab-panel');
            if (!tabPanel) {
                console.error('BŁĄD: Nie znaleziono kontenera ".tab-panel"!'); // BŁĄD 1
                return;
            }

            const step2Container = tabPanel.querySelector('.cf7-step-2-container');
            if (!step2Container) {
                console.error('BŁĄD: Nie znaleziono kontenera ".cf7-step-2-container" wewnątrz zakładki!'); // BŁĄD 2
                return;
            }
            
            console.log('Kontenery krok 1 i 2 znalezione. Przystępuję do przenoszenia danych.'); // SONDA 4

            try {
                // Przenoszenie danych
             const name = submittedForm.querySelector('input[name="your-name"]').value;
const phone = submittedForm.querySelector('input[name="phone"]').value; // <-- POPRAWIONA LINIA
const email = submittedForm.querySelector('input[name="your-email"]').value;

                step2Container.querySelector('input[name="name-step1"]').value = name;
                step2Container.querySelector('input[name="phone-step1"]').value = phone;
                step2Container.querySelector('input[name="email-step1"]').value = email;
                
                console.log('Dane przeniesione pomyślnie.'); // SONDA 5

                // Ukrywanie i pokazywanie
                step1Container.style.display = 'none';
                step2Container.style.display = 'block';

                console.log('Formularze przełączone.'); // SONDA 6
            } catch (e) {
                console.error('BŁĄD podczas przenoszenia danych lub przełączania widoku:', e); // BŁĄD 3
            }
        }
    }, false);
});