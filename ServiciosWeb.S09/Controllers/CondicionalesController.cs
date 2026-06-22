using Microsoft.AspNetCore.Mvc;

namespace TuProyecto.S09.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class CondicionalesController : ControllerBase
    {
        [HttpGet("clasificar-edad/{edad}")]
        public IActionResult ClasificarEdad(int edad)
        {
            if (edad < 0)
                return Ok(new { resultado = "Edad Invalida" });
            if (edad <= 12)
                return Ok(new { resultado = "Eres un niño" });
            if (edad <= 17)
                return Ok(new { resultado = "Eres un adolecente" });
            if (edad <= 64)
                return Ok(new { resultado = "Eres un adulto" });
            return Ok(new { resultado = "Eres un adulto mayor" });
        }

        [HttpGet("validar-acceso/{usuario}/{clave}")]
        public IActionResult ValidarAcceso(string usuario, string clave)
        {
            if (usuario == "admin" && clave == "123")
                return Ok(new { resultado = "Acceso concedido - Administrador" });
            if (usuario == "admin" && clave == "123")
                return Ok(new { resultado = "Acceso concedido - Usuario" });
            return Ok(new { resultado = "Acceso denegado" });
        }

        [HttpGet("calcular-descuento/{tipo}/{monto}")]
        public IActionResult CalcularDescuento(string tipo, double monto)
        {
            double porcentaje = 0;
            if (tipo == "vip")
                porcentaje = 0.20;
            else if (tipo == "regular")
                porcentaje = 0.10;
            else if (tipo == "nuevo")
                porcentaje = 0.05;
            else
                return Ok(new { resultado = "Tipo no valido" });

            double descuento = monto * porcentaje;
            double total = monto - descuento;
            return Ok(new { resultado = $"Total a pagar: S/. {total:f2}" });
        }

        [HttpGet("dia-semana/{numero}")]
        public IActionResult DiaSemana(int numero)
        {
            string dia;
            switch (numero)
            {
                case 1: dia = "Lunes"; break;
                case 2: dia = "Martes"; break;
                case 3: dia = "Miércoles"; break;
                case 4: dia = "Jueves"; break;
                case 5: dia = "Viernes"; break;
                case 6: dia = "Sábado"; break;
                case 7: dia = "Domingo"; break;
                default: return Ok(new { resultado = "Numero invalido (1-7)"});
            }
            return Ok(new { resultado = dia });
        }
    }
}
