import './bootstrap';
import '../css/app.css';

 const carga = document.getElementById('carga-global');
  if (carga) {
    setTimeout(()=>{
        carga.style.display = 'none';
    }, 0)
  }

