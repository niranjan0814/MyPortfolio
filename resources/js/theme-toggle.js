/**
 * Global Theme Switcher – Light ↔ Dark
 * Works for all themes (Theme 1, Theme 2, etc.)
 */

function initTheme() {
    const saved = localStorage.getItem('portfolio-theme') || 'light';
    applyTheme(saved);
    updateButtons(saved);
}

function applyTheme(theme) {
    // Set data-theme on html element
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('portfolio-theme', theme);

    // Dispatch event for theme-specific scripts to listen to
    window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: theme } }));
}

function toggleTheme() {
    const current = document.documentElement.getAttribute('data-theme') || 'light';
    const next = current === 'light' ? 'dark' : 'light';
    applyTheme(next);
    updateButtons(next);
}

function updateButtons(currentTheme) {
    const nextLabel = currentTheme === 'dark' ? 'Light' : 'Dark';

    // SVG Icons
    const sun = `<path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>`;
    const moon = `<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>`;

    document.querySelectorAll('#theme-toggle, .theme-toggle-btn').forEach(btn => {
        const label = btn.querySelector('.theme-label');
        const svg = btn.querySelector('svg');

        if (label) label.textContent = nextLabel;
        btn.setAttribute('aria-label', `Switch to ${nextLabel} Mode`);
        btn.setAttribute('title', `Switch to ${nextLabel} Mode`);

        if (svg) svg.innerHTML = currentTheme === 'dark' ? sun : moon;
    });
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    initTheme();

    // Attach event listeners to all theme toggle buttons
    // Use event delegation or re-attach if buttons are dynamic, but simple for now
    const attachListeners = () => {
        document.querySelectorAll('#theme-toggle, .theme-toggle-btn').forEach(btn => {
            // Remove old listener to prevent duplicates if function runs multiple times
            btn.removeEventListener('click', handleToggleClick);
            btn.addEventListener('click', handleToggleClick);
        });
    };

    const handleToggleClick = (e) => {
        e.preventDefault();
        toggleTheme();
    };

    attachListeners();

    // Re-attach listeners if DOM changes (optional, but good for safety)
    const observer = new MutationObserver(attachListeners);
    observer.observe(document.body, { childList: true, subtree: true });
});

// Expose globally
window.toggleTheme = toggleTheme;
