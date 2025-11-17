/**
 * Theme Switcher - Light ↔ Dark
 * Persists theme choice in localStorage
 * FIXED: Consistent Light/Dark labeling
 */

// Initialize theme on page load
function initTheme() {
  const savedTheme = localStorage.getItem('portfolio-theme') || 'light';
  applyTheme(savedTheme);
  updateAllToggleButtons(savedTheme);
}

// Apply theme to document
function applyTheme(theme) {
  const html = document.documentElement;
  html.style.transition = 'all 0.4s ease';
  html.setAttribute('data-theme', theme);
  
  // Update body background
  document.body.style.background = theme === 'dark' ? '#000000' : '#ffffff';
  
  // Save to localStorage
  localStorage.setItem('portfolio-theme', theme);
  
  console.log(`🎨 Theme switched to: ${theme === 'dark' ? 'Dark Mode' : 'Light Mode'}`);
}

// Toggle between themes
function toggleTheme() {
  const html = document.documentElement;
  const currentTheme = html.getAttribute('data-theme') || 'light';
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  
  applyTheme(newTheme);
  updateAllToggleButtons(newTheme);
  animateThemeTransition();
}

// Update ALL toggle buttons (desktop + mobile)
function updateAllToggleButtons(theme) {
  // Select ALL toggle buttons - both desktop and mobile
  const toggleBtns = document.querySelectorAll('#theme-toggle, button[onclick="toggleTheme()"], .theme-toggle-btn');
  
  toggleBtns.forEach(toggleBtn => {
    const icon = toggleBtn.querySelector('svg');
    const label = toggleBtn.querySelector('.theme-label, span');
    
    if (theme === 'dark') {
      // Currently DARK → Show "Light" (switch to light)
      if (label) label.textContent = 'Light';
      toggleBtn.setAttribute('aria-label', 'Switch to Light Mode');
      toggleBtn.setAttribute('title', 'Switch to Light Mode');
      
      // Sun icon (for switching TO light)
      if (icon) {
        icon.innerHTML = `<path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>`;
      }
    } else {
      // Currently LIGHT → Show "Dark" (switch to dark)
      if (label) label.textContent = 'Dark';
      toggleBtn.setAttribute('aria-label', 'Switch to Dark Mode');
      toggleBtn.setAttribute('title', 'Switch to Dark Mode');
      
      // Moon icon (for switching TO dark)
      if (icon) {
        icon.innerHTML = `<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>`;
      }
    }
  });
}

// Add visual feedback during theme transition
function animateThemeTransition() {
  const html = document.documentElement;
  html.style.opacity = '0.8';
  setTimeout(() => {
    html.style.opacity = '1';
  }, 200);
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  
  // Add click handlers to ALL toggle buttons
  const toggleBtns = document.querySelectorAll('#theme-toggle, button[onclick="toggleTheme()"], .theme-toggle-btn');
  toggleBtns.forEach(btn => {
    // Remove inline onclick to avoid duplicate calls
    btn.removeAttribute('onclick');
    btn.addEventListener('click', toggleTheme);
  });
});

// Export for global use
window.toggleTheme = toggleTheme;