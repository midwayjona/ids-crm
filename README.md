# [CC6] Project 1 - Webservices

## Tarjeta de Crédito
Está aplicación servirá para la administración de las tarjetas de crédito (o débito).
Contará con las opciones para registro de las tarjetas emitidas: Número, nombre del titular, fecha de
vencimiento, número de seguridad, monto autorizado y monto disponible. Además, debe registrar todas
las transacciones autorizadas para una tarjeta de crédito (consumos y pagos). Cuando reciba una
solicitud de autorización verificará que la tarjeta sea válida, que los datos sean correctos, que no esté
vencida y que tenga disponibilidad, entonces enviará el número de autorización o DENEGADO.

**Consultas remotas**: Las transacciones se harán mediante llamadas a scripts que implementan las
consultas y procesos, los resultados serán enviados usando XML o JASON

A continuación, aparece el formato de las llamadas a scripts y el formato de los resultados para lo cual
deberá tomar cumplir lo siguiente:
* El destino será un código de 5 caracteres que identifique la ciudad.
* Para las fechas usar el formato: yyyymmdd y para las horas hh:nn.
* El identificador de los emisores de tarjeta de crédito y courriers 15 caracteres
* Los números de tarjeta 16 dígitos (sin guiones)
* Para la fecha de vencimiento usar el formato: yyyymm

Para solicitar la autorización del pago:  
emisor/autorizacion?tarjeta=___&nombre=___&fecha_venc=___& num_seguridad=___&monto=___&tienda=___&formato=__

##### XML
```
<autorizacion>
  <emisor> </emisor>
  <tarjeta> </tarjeta>
  <status> </status>
  <numero> </numero>
</autorizacion>
```

##### JSON

```
{ “autorización” : 
  { 
    “emisor” : “ ” ,
    “tarjeta” : “ ” ,
    “status” : “ ” ,
    “numero” : “ ”
  }
}
```

El status será **APROBADO** ó **DENEGADO**, si es denegado el número es **0**.
