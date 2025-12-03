document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM załadowany. Skrypt gotowy do nasłuchu.'); // SONDA 1

    // helper: szuka pierwszego elementu z listy możliwych nazw i zwraca jego value
    function getFieldValue(form, possibleNames) {
        for (let name of possibleNames) {
            let el = form.querySelector('[name="' + name + '"]');
            if (el) return el.value || '';
        }
        return '';
    }

    // helper: ustawia wartość w formie docelowej; jeśli pole nie istnieje - tworzy hidden input i dodaje do formElement
    function setOrCreateHidden(formElement, name, value) {
        let el = formElement.querySelector('[name="' + name + '"]');
        if (el) {
            try { el.value = value; return true; } catch(e){ console.warn('Nie udało się ustawić value dla', name, e); return false; }
        } else {
            // utwórz hidden i dodaj do formElement
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            formElement.appendChild(input);
            console.log('Utworzono hidden:', name, '->', value);
            return true;
        }
    }

    document.addEventListener('wpcf7mailsent', function(event) {
        console.log('Zdarzenie wpcf7mailsent wykryte!', event.detail); // SONDA 2

        const submittedForm = event.target; // <form> CF7, który został wysłany
        if (!submittedForm) {
            console.warn('Nie znaleziono submittedForm w event.target'); return;
        }

        const step1Container = submittedForm.closest('.cf7-step-1-container');

        if (!step1Container) {
            console.log('Wysłany formularz nie jest wewnątrz .cf7-step-1-container — ignoruję.'); 
            return; // nie jest to nasz formularz kroku 1
        }

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

        // Znajdź FORM wewnątrz step2Container (to właściwy element formularza CF7)
        const step2Form = step2Container.querySelector('form.wpcf7-form') || step2Container.querySelector('form');
        if (!step2Form) {
            console.warn('Nie znaleziono <form> w .cf7-step-2-container — spróbuję dopisać hiddeny do kontenera.');
        }

        console.log('Kontenery krok 1 i 2 znalezione. Przystępuję do przenoszenia danych.'); // SONDA 4

        try {
            // Możliwe warianty nazw pól w formularzu 1 (próbujemy dopasować)
            const name = getFieldValue(submittedForm, ['your-name', 'name', 'your_name']);
            const phone = getFieldValue(submittedForm, ['your-phone', 'phone', 'your_phone', 'tel']);
            const email = getFieldValue(submittedForm, ['your-email', 'email', 'your_email']);

            console.log('Pobrane wartości -> name:', name, 'phone:', phone, 'email:', email);

            // gdzie wstawić hiddeny — preferencyjnie do formularza (step2Form), a jeśli go nie ma to do step2Container
            const targetForHidden = step2Form || step2Container;

            setOrCreateHidden(targetForHidden, 'name-step1', name);
            setOrCreateHidden(targetForHidden, 'phone-step1', phone);
            setOrCreateHidden(targetForHidden, 'email-step1', email);

            console.log('Dane przeniesione pomyślnie.'); // SONDA 5

            // Ukrywanie i pokazywanie
            step1Container.style.display = 'none';
            step2Container.style.display = 'block';

            console.log('Formularze przełączone.'); // SONDA 6
        } catch (e) {
            console.error('BŁĄD podczas przenoszenia danych lub przełączania widoku:', e); // BŁĄD 3
        }
    }, false);
});