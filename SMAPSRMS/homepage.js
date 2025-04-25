// JavaScript to handle navigation and dynamic section display

document.addEventListener('DOMContentLoaded', () => {
    // Map form IDs to section IDs
    const navMap = {
        'nav-dashboard': 'dashboard-section',
        'nav-registration': 'baptismReg-section',
        'nav-baptism': 'baptismalRec-section',
        'nav-communion': 'communion-section',
        'nav-confirmation': 'confirmation-section',
        'nav-marriage': 'marriageReg-section'
    };

    // Hide all sections initially
    function hideAllSections() {
        Object.values(navMap).forEach(sectionId => {
            const section = document.getElementById(sectionId);
            if (section) {
                section.style.display = 'none';
            }
        });
    }

    // Show a specific section
    function showSection(sectionId) {
        hideAllSections();
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
        }
    }

    // Attach event listeners to navigation forms to prevent default and show sections
    Object.entries(navMap).forEach(([formId, sectionId]) => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                showSection(sectionId);
            });
        }
    });

    // Expose hideSection function globally for close buttons
    window.hideSection = function(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'none';
        }
    };

    // Initially show dashboard section or any default section
    showSection('dashboard-section');
});
