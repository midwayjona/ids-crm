# [IS] Customer Relationship Management

## Costumer
Está aplicación servirá para la administración de los clientes.

**Consultas remotas**: Las transacciones se harán mediante llamadas a scripts que implementan las
consultas y procesos, los resultados serán enviados usando XML o JASON

A continuación, aparece el formato de las llamadas a scripts y el formato de los resultados para lo cual
deberá tomar cumplir lo siguiente:
* El destino será un código de 5 caracteres que identifique la ciudad.
* Para las fechas usar el formato: yyyymmdd y para las horas hh:nn.
* El identificador de los emisores de tarjeta de crédito y courriers 15 caracteres
* Los números de tarjeta 16 dígitos (sin guiones)
* Para la fecha de vencimiento usar el formato: yyyymm
