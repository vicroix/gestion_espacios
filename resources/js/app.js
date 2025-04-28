import './bootstrap';
import '../css/app.css';

const inputCodigoPostal = document.getElementById('codigo_postal');
inputCodigoPostal.addEventListener('input', function(){
    if(this.value.length > 5){
        this.value = this.value.slice(0, 5);
    }
});
