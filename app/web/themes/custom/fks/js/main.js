const ready = () => {
  const injected = document.createElement('div');
  injected.textContent = 'Injected Content.';
  document.body.appendChild(injected);
};

document.addEventListener('DOMContentLoaded', ready);
