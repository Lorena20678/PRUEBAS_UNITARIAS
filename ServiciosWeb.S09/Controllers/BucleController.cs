using Microsoft.AspNetCore.Mvc;

namespace TuProyecto.S09.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class BuclesController : ControllerBase
    {
        [HttpGet("tabla-multiplicar/{numero}")]
        public IActionResult TablaMultiplicar(int numero)
        {
            string resultado = "";
            for (int i = 1; i <= 12; i++)
            { resultado += $"{numero} x {i} = {numero * i}\n";}
            return Ok(new { resultado });
        }

        [HttpGet("sumar-numeros/{numero}")]
        public IActionResult SumarNumeros(int numero)
        {
            int suma = 0;
            int i = 1;
            while (i <= numero)
            {suma += i;
             i++;}
            return Ok(new { resultado = $"La suma de 1 a {numero} es {suma}" });
        }

        [HttpGet("numeros-pares/{limite}")]
        public IActionResult NumerosPares(int limite)
        {
            string resultado = "";
            for (int i = 2; i <= limite; i += 2)
            {resultado += i + " ";}
            return Ok(new { resultado });
        }

        [HttpGet("factorial/{numero}")]
        public IActionResult Factorial(int numero)
        {
            long factorial = 1;
            for (int i = 1; i <= numero; i++)
            {factorial *= i;}
            return Ok(new { resultado = $"{numero}! = {factorial}" });
        }

        [HttpGet("validar-acceso/{usuario}/{clave}")]
        public IActionResult ValidarAcceso(string usuario, string clave)
        {
            int intentos = 0;
            bool acceso = false;

            do
            {if (usuario == "mantarilorena@gmail.com" && clave == "lorena")
                {acceso = true;}
                intentos++;
            } while (!acceso && intentos < 3);
            if (acceso)
                return Ok(new { resultado = "Acceso concedido" });
            return Ok(new { resultado = "Acceso denegado" });
        }

        [HttpGet("lista-productos")]
        public IActionResult ListaProductos()
        {
            string[] productos =
            {"Laptop",
             "Mouse",
             "Teclado",
             "Monitor",
             "Impresora"};
             string resultado = "";
             foreach (string producto in productos)
            {resultado += producto + "\n";}
            return Ok(new { resultado });
        }

        [HttpGet("fibonacci/{cantidad}")]
        public IActionResult Fibonacci(int cantidad)
        {
            int a = 0;
            int b = 1;
            string resultado = "";
            for (int i = 0; i < cantidad; i++)
            { resultado += a + " ";
            int temp = a + b;
                a = b;
                b = temp;}
            return Ok(new { resultado });
        }
    }
}