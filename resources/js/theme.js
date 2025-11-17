/**
 * Theme Switcher - Light ↔ Dark (Monochrome Liquid Glass)
 * Persists theme choice in localStorage
 */

// Initialize theme on page load
function initTheme() {
  const savedTheme = localStorage.getItem('portfolio-theme') || 'normal';
  applyTheme(savedTheme);
  updateToggleButton(savedTheme);
}

// Apply theme to document
function applyTheme(theme) {
  const html = document.documentElement;
  
  // Add transition class for smooth theme change
  html.style.transition = 'all 0.4s ease';
  
  // Set theme attribute
  html.setAttribute('data-theme', theme);
  
  // Update body background
  if (theme === 'monochrome') {
    document.body.style.background = '#000000';
  } else {
    document.body.style.background = '#ffffff';
  }
  
  // Save to localStorage
  localStorage.setItem('portfolio-theme', theme);
  
  // Log for debugging
  console.log(`🎨 Theme switched to: ${theme === 'monochrome' ? 'Dark' : 'Light'}`);
}

// Toggle between themes
function toggleTheme() {
  const html = document.documentElement;
  const currentTheme = html.getAttribute('data-theme') || 'normal';
  const newTheme = currentTheme === 'normal' ? 'monochrome' : 'normal';
  
  applyTheme(newTheme);
  updateToggleButton(newTheme);
  
  // Add animation feedback
  animateThemeTransition();
}

// Update toggle button appearance - FIXED LABELS
function updateToggleButton(theme) {
  const toggleBtns = document.querySelectorAll('#theme-toggle, [onclick="toggleTheme()"]');
  
  toggleBtns.forEach(toggleBtn => {
    if (!toggleBtn) return;
    
    const icon = toggleBtn.querySelector('svg');
    const label = toggleBtn.querySelector('.theme-label, span:last-child');
    
    if (theme === 'monochrome') {
      // Current: Dark mode → Show "Light" to switch back
      if (icon) {
        icon.innerHTML = `
          <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>
        `;
      }
      if (label) label.textContent = 'Light';
      toggleBtn.setAttribute('aria-label', 'Switch to Light Mode');
    } else {
      // Current: Light mode → Show "Dark" to switch
      if (icon) {
        icon.innerHTML = `
          <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
        `;
      }
      if (label) label.textContent = 'Dark';
      toggleBtn.setAttribute('aria-label', 'Switch to Dark Mode');
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
  
  // Add click handler to all toggle buttons
  const toggleBtns = document.querySelectorAll('#theme-toggle');
  toggleBtns.forEach(btn => {
    if (btn) {
      btn.addEventListener('click', toggleTheme);
    }
  });
});

// Export for use in inline scripts if needed
window.toggleTheme = toggleTheme;