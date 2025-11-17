/**
 * Theme Switcher - Light ↔ Dark
 * Persists theme choice in localStorage
 * COMPLETE FIX: Shows "Light" or "Dark" based on CURRENT theme
 */

// Initialize theme on page load
function initTheme() {
  const savedTheme = localStorage.getItem('portfolio-theme') || 'light';
  console.log('🎨 Initializing theme:', savedTheme);
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
  
  console.log(`✅ Theme applied: ${theme === 'dark' ? 'Dark Mode' : 'Light Mode'}`);
}

// Toggle between themes
function toggleTheme() {
  const html = document.documentElement;
  const currentTheme = html.getAttribute('data-theme') || 'light';
  const newTheme = currentTheme === 'light' ? 'dark' : 'light';
  
  console.log(`🔄 Toggling: ${currentTheme} → ${newTheme}`);
  
  applyTheme(newTheme);
  updateAllToggleButtons(newTheme);
  animateThemeTransition();
}

// Update ALL toggle buttons (desktop + mobile)
// KEY FIX: Label shows CURRENT mode, not target mode
function updateAllToggleButtons(currentTheme) {
  console.log(`🔧 Updating ${document.querySelectorAll('#theme-toggle, button[onclick="toggleTheme()"], .theme-toggle-btn').length} toggle buttons for theme: ${currentTheme}`);
 
  // Select ALL toggle buttons - both desktop and mobile
  const toggleBtns = document.querySelectorAll('#theme-toggle, button[onclick="toggleTheme()"], .theme-toggle-btn');
 
  toggleBtns.forEach((toggleBtn, index) => {
    const icon = toggleBtn.querySelector('svg');
    const label = toggleBtn.querySelector('.theme-label, span');
   
    // CRITICAL FIX: Label shows what mode you'll SWITCH TO, not current mode
    // Currently DARK → Show "Light" (click to switch TO light)
    // Currently LIGHT → Show "Dark" (click to switch TO dark)
    const displayLabel = currentTheme === 'dark' ? 'Light' : 'Dark';
    console.log(` Button ${index + 1}: Currently ${currentTheme}, showing "${displayLabel}" to switch TO`);
   
    if (currentTheme === 'dark') {
      // Currently DARK → Show "Light" button with sun icon
      if (label) label.textContent = 'Light';
      toggleBtn.setAttribute('aria-label', 'Switch to Light Mode');
      toggleBtn.setAttribute('title', 'Switch to Light Mode');
     
      // Sun icon (for switching TO light)
      if (icon) {
        icon.innerHTML = `<path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/>`;
      }
    } else {
      // Currently LIGHT → Show "Dark" button with moon icon
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
  console.log('🚀 Theme system initializing...');
  
  // Initialize theme first
  initTheme();
  
  // Add click handlers to ALL toggle buttons
  const toggleBtns = document.querySelectorAll('.theme-toggle-btn, #theme-toggle');
  
  console.log(`📌 Found ${toggleBtns.length} theme toggle buttons`);
  
  toggleBtns.forEach((btn, index) => {
    // Remove any inline onclick to avoid duplicate calls
    btn.removeAttribute('onclick');
    
    // Add event listener
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      console.log(`🖱️ Button ${index + 1} clicked`);
      toggleTheme();
    });
  });
  
  console.log('✅ Theme system ready');
});

// Export for global use
window.toggleTheme = toggleTheme;
window.initTheme = initTheme;