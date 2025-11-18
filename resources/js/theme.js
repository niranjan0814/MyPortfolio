/**
 * PERFECT THEME SWITCHER – Light ↔ Dark
 * Keeps ALL your beautiful CSS variables, glassmorphism, liquid glass background
 * No more ugly #000000 override
 */

function initTheme() {
  const saved = localStorage.getItem('portfolio-theme') || 'light';
  applyTheme(saved);
  updateButtons(saved);
  createGlassOrbs();
}

function applyTheme(theme) {
  // ONLY change the data-theme attribute → your CSS does the rest
  document.documentElement.setAttribute('data-theme', theme);
  localStorage.setItem('portfolio-theme', theme);
  
  // Update glass orbs visibility
  updateGlassOrbs(theme);
}

function toggleTheme() {
  const current = document.documentElement.getAttribute('data-theme') || 'light';
  const next = current === 'light' ? 'dark' : 'light';
  applyTheme(next);
  updateButtons(next);
  animateTransition();
}

function updateButtons(currentTheme) {
  const nextLabel = currentTheme === 'dark' ? 'Light' : 'Dark';
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

function animateTransition() {
  document.documentElement.style.opacity = '0.7';
  setTimeout(() => document.documentElement.style.opacity = '1', 220);
}

/**
 * Create floating glass orbs for dark mode
 */
function createGlassOrbs() {
  // Check if orbs container already exists
  if (document.querySelector('.glass-orbs')) return;
  
  const orbsContainer = document.createElement('div');
  orbsContainer.className = 'glass-orbs';
  document.body.appendChild(orbsContainer);
  
  updateGlassOrbs(document.documentElement.getAttribute('data-theme') || 'light');
}

function updateGlassOrbs(theme) {
  const orbsContainer = document.querySelector('.glass-orbs');
  if (!orbsContainer) return;
  
  if (theme === 'dark') {
    orbsContainer.style.display = 'block';
  } else {
    orbsContainer.style.display = 'none';
  }
}

// Run everything
document.addEventListener('DOMContentLoaded', () => {
  initTheme();
  
  // Attach event listeners to all theme toggle buttons
  document.querySelectorAll('#theme-toggle, .theme-toggle-btn').forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      toggleTheme();
    });
  });
});

// Expose toggleTheme globally for inline onclick handlers
window.toggleTheme = toggleTheme;