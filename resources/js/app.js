import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

/**
 * Sidebar State Handler
 * Inilabas natin ang logic para madaling matawag ng Alpine x-data
 */
window.getInitialSidebarState = () => {
    const isMobile = window.innerWidth < 1024;
    const savedState = localStorage.getItem('sidebarState');
    
    if (isMobile) return false;
    // Default is true (open) if no saved state exists
    return savedState === null ? true : savedState === 'true';
};

// Initial setup to prevent flicker
(function() {
    const initialState = window.getInitialSidebarState();
    if (!initialState && window.innerWidth >= 1024) {
        document.documentElement.classList.add('sidebar-collapsed');
    }
})();

Alpine.start();

// Password Toggle Function
window.togglePassword = (inputId, button) => {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('.eye-icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    } else {
        input.type = 'password';
        icon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18M9.88 9.88a3 3 0 104.24 4.24M10.73 5.08A10.43 10.43 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.057 10.057 0 01-1.563 3.029m-5.858 1.091A10.03 10.03 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.059 10.059 0 011.563-3.029" />
        `;
    }
};

// Modal Functions
const closeModal = () => {
    const modal = document.getElementById('success-modal');
    if (modal) {
        modal.style.opacity = '0';
        setTimeout(() => {
            modal.remove();
        }, 100);
    }
};

window.closeModal = closeModal;

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('success-modal');
    if (modal) {
        setTimeout(() => {
            closeModal();
        }, 1000);
    }
});

// Date Filter Logic
document.addEventListener('DOMContentLoaded', () => {
    const dateInput = document.getElementById('dateInput');
    const dateDisplay = document.getElementById('dateDisplay');

    if (dateInput && dateDisplay) {
        const dateWrapper = dateInput.parentElement;

        dateWrapper.addEventListener('click', function(e) {
            // Iwasan ang double trigger kung ang mismong input ang na-click
            if (e.target !== dateInput) {
                if ('showPicker' in HTMLInputElement.prototype) {
                    dateInput.showPicker();
                } else {
                    dateInput.focus();
                }
            }
        });

        dateInput.addEventListener('change', function() {
            const dateValue = this.value; 
            if (dateValue) {
                const dateObj = new Date(dateValue);
                const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
                const dd = String(dateObj.getDate()).padStart(2, '0');
                const yyyy = dateObj.getFullYear();
                
                dateDisplay.innerText = `${mm}/${dd}/${yyyy}`;
                dateDisplay.classList.add('text-dost-cyan');
            } else {
                resetDateFilter();
            }
        });

        function resetDateFilter() {
            dateInput.value = ''; 
            dateDisplay.innerText = 'mm/dd/yyyy'; 
            dateDisplay.classList.remove('text-dost-cyan');
        }
    }
});