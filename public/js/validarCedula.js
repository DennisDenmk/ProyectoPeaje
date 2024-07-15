function validarCedulaEcuatoriana(cedula) {
    // Verificar que la cédula tenga 10 dígitos
    if (cedula.length !== 10) {
      return false;
    }
  
    // Convertir la cédula a un array de números
    const digitos = cedula.split('').map(Number);
  
    // Verificar que todos los caracteres sean dígitos
    if (digitos.some(isNaN)) {
      return false;
    }
  
    // Verificar el código de provincia
    const codigoProvincia = parseInt(cedula.substring(0, 2), 10);
    if (codigoProvincia < 1 || codigoProvincia > 24) {
      return false;
    }
  
    // Verificar el tercer dígito
    const tercerDigito = digitos[2];
    if (tercerDigito < 0 || tercerDigito > 6) {
      return false;
    }
  
    // Coeficientes para el cálculo del dígito verificador
    const coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
  
    // Calcular el dígito verificador
    let suma = 0;
    for (let i = 0; i < 9; i++) {
      let producto = digitos[i] * coeficientes[i];
      if (producto >= 10) {
        producto -= 9;
      }
      suma += producto;
    }
  
    const digitoVerificadorCalculado = (10 - (suma % 10)) % 10;
  
    // Verificar que el dígito verificador sea correcto
    const digitoVerificador = digitos[9];
    return digitoVerificador === digitoVerificadorCalculado;
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('registroForm').addEventListener('submit', function(event) {
      const cedula = document.getElementById('cedula').value;
      const errorMessage = document.getElementById('error-message');
      
      if (!validarCedulaEcuatoriana(cedula)) {
        event.preventDefault();
        errorMessage.textContent = 'La cédula ingresada no es válida. Por favor, verifíquela.';
      } else {
        errorMessage.textContent = '';
      }
    });
  });
  