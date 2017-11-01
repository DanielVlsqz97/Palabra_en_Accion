<!DOCTYPE html>
<html>
  <head>
  <STYLE TYPE="text/css">
   .bloque{ padding-left:70px;}
</STYLE>
  </head>

  <body>
    <font size=2>
      <p ALIGN=center >
        <b>CONTRATO DE ADHESIÓN POR PRESTACIÓN DE SERVICIOS EDUCATIVOS DEL <br/> CRISTIANA PALABRA EN ACCIÓN </b>
      </p>

        <p align="right">
          <font size=2><b>Correlativo Interno Contrato No. 0000 <br/> Aprobado y registrado según Resolución DIACO: DID-2934-2015</b></font>
        </p>

        <HR width="100%" align="center">

        <p align="justify">
          En el municipio de San Marcos del departamento de San Marcos, el día {{\Carbon\Carbon::parse($contrato->fecha)->day}} del mes  {{\Carbon\Carbon::parse($contrato->fecha)->month}} del año {{\Carbon\Carbon::parse($contrato->fecha)->year}}, NOSOTROS: Elio Alberto Orozco Vásquez, de 49 años de edad, casado, guatemalteco, ingeniero electricista, de este domicilio, me identifico con Documento Personal de Identificación No. 2400 57864 1201. Actuó en mi calidad de representante legal de la entidad denominada Asociación de Iglesia Cristiana Evangélica ¨Palabra en Acción¨ de San Marcos propietario(a) del centro educativo denominado ¨Escuela Cristiana Palabra en Acción¨, ubicado en 7z Av. ¨A¨ 12-10 zona 1, municipio de San Marcos del departamento de San Marcos, lo que acredito con: acta de nombramiento autorizada en la ciudad de San Marcos, el 14 de agosto de 2013, por la Notaria Luisa María Arango Marroquín, inscrita en el Registro Mercantil General de La Republica, bajo el No. 15, folio 60 al 62 del libro 4, de personas jurídicas del registro civil de la Municipalidad de San Marcos y: <br/>
        </p>

        <p ALIGN=center><b> (DATOS DEL PADRE DE FAMILIA O REPRESENTANTE LEGAL DEL EDUCANDO)</b> </p>
        <p align="justify">
          <b>{{$contrato->nombre_encargado.' '.$contrato->apellidos_encargado}}</b> de <b>{{\Carbon\Carbon::parse($contrato->fecha_nac)->age}}</b> años de edad, <b>{{$contrato->estado_civil}}</b>, <b>{{$contrato->nacionalidad}}</b>,<b> {{$contrato->profesion}}</b>, de este domicilio, me identifico con Documento Personal de Identificacion No. <b>{{$contrato->dpi}} </b> con residencia en: <b>{{$contrato->domicilio}}</b> con numero de telefono en casa <b></b>, oficina <b></b> y celular <b></b>, actuo en mi calidad de
        </p>

        <p align="justify">Declarando que la información personal proporcionada, es de carácter confidencial. Los comparecientes, aseguramos ser de los datos de identificación anotados, estar en el libre ejercicio de nuestros derechos civiles y celebramos CONTRATO DE ADHESION POR PRESTACION DE SERVICIOS EDUCATIVOS, de conformidad con las siguientes clausulas:</p><br/>

        <p align="justify">
            <b>PRIMERA. INFORMACION DEL EDUCANDO Y SERVICIO EDUCATIVO CONTRATADO:</b><br/><br/>
            <b>{{$contrato->nombre.' '.$contrato->apellido}}</b> Quien cursara el grado <b>{{$contrato->nombre_grado.' '.$contrato->nombre_nivel}}</b> con jornada <b>{{$contrato->nombre_jornada}}</b><br/><br/>

            Servicio educativo que está debidamente autorizado por el Ministerio de Educación, de conformidad con las resolución(es): nivel Pre-Primario, Primario Y Básico No. 252-2012, con fecha veintiuno de junio de dos mil doce emitida(s) por la Dirección Departamental de Educación de San Marcos.<br/><br/>

            <b>SEGUNDA. DEL PLAZO:</b> El servicio educativo convenido en este Contrato, será válido para el ciclo escolar del año  {{\Carbon\Carbon::now()->year+1}}, durante su vigencia, no puede ser modificada ninguna de sus cláusulas, las que se deberán cumplir a cabalidad; asi como, con todo lo ofrecido a los padres de familia, tanto en la publicidad efectuada en los medios de comunicación, información escrita o cualquier otro documento publicitario.<br/><br/>

            <b>TERCERA: DERECHOS DEL EDUCANDO Y PADRE DE FAMILIA:</b> El Educando y el Padre de Familia o Representante Legal del mismo, como usuarios del servicio educativo contratado, en armonía con el Articulo 4 de la Ley de Protección al Consumidor y Usuario, tendrá derecho a: <br/><br/>
            <p class="bloque" align="justify"><u>a.	La protección a la vida, salud y seguridad en la adquisición, consumo y uso de bienes y servicios:</u>
            Las instalaciones del centro educativo, están adecuadas para que los educandos no corran ninguna clase de riesgo que ponga en peligro su integridad física, también están dotadas de todos los servicios básicos ofrecidos a los padres de familia. En el caso que la prestación del servicio de transporte sea brindado por una entidad ajena al centro educativo, este proporcionara todas las medidas de seguridad necesarias, para la debida protección de los educandos; así mismo, propondrán medidas de seguridad a los padres a través de un seguro escolar, el cual no será obligatorio, pero debe quedar en acta, la decisión del padre de la adquisición o no del mismo, se debe de velar por la seguridad de los educandos en cualquier actividad propuesta y hacerlo siempre del conocimiento de los padres, para su respectivo consentimiento de participación.<br/>
              <u>b.	La libertad de elección del bien o servicio:</u> Los padres de familia tiene el derecho de poder adquirir, tanto los útiles escolares, como los uniformes, transporte, seguro y otros servicios adicionales, en el establecimiento comercial que se adecue mejor a su capacidad económica; sin embargo, el centro educativo puede facilitar la compra o prestación de servicios, siempre y cuando medie convenio por escrito, en el cual lo solicitan los padres de familia, debiendo en tal caso, cumplir con las obligaciones tributarias correspondientes.<br/>
              <u>c.	La libertad de contratación:</u> El padre de familia o representante legal del educando, tiene el derecho a la libre contratación, por lo que para los bienes o servicios que sean necesarios para la educación de su (s) hijo (s), puede contratar o adquirir los bienes o servicios (Transporte, Seguro Escolar y otros), que más se adecuen a su capacidad económica. Si el proveedor propietario del centro educativo desea autenticar las firmas del contrato, se deja constancia que los honorarios del Notario autorizante serán a su cargo y sin costo alguno para el padre de familia.<br/>
              <u>d.	La información veraz, suficiente, clara y oportuna sobre los bienes y servicios:</u> El centro educativo se compromete a proporcionar a los padres de familia, la información completa sobre el servicio contratado y especialmente los horarios de clases, los grados y las carreras autorizadas que se imparten, los sistemas de evaluación, cursos adicionales que imparten, el monto de las cuotas que cobran, tanto de inscripción como de cuota mensual; así como, de las actividades extraescolares de carácter voluntario u optativas, que se pueden realizar durante el ciclo escolar respectivo y este caso las autoridades del centro educativo, tienen la obligación de cumplir con el Acuerdo Ministerial 483-2010, el que regula las actividades técnicas y administrativas de las academias que imparten cursos libres, las cuales funcionaran bajo la rectoría del Ministerio de Educación, el mismo Acuerdo Ministerial en su Artículo 3, define que las academias de cursos libres son instituciones que ofrecen servicios educativos de formación y capacitación; y el Acuerdo Ministerial 1345 de fecha 2 de septiembre de 1965 que contiene el Reglamento de Excursiones Escolares. <br/>
              <u>e.	Utilizar el Libro de Quejas o el medio legalmente autorizado por la Dirección de Atención y Asistencia al Consumidor, para dejar registro de su inconformidad con respecto a un bien adquirido o servicio contratado:</u> Al hacer constar su inconformidad en el libro de quejas, el padre de familia o representante legal del educando, debe esperar un periodo prudencial de ocho días, para que la misma sea resuelta por las autoridades del centro educativo, transcurrido ese tiempo, sin que exista una solución satisfactoria, deberá interponer la queja correspondiente ante la DIACO, para proceder con el procedimiento administrativo respectivo. <br/><br/></p>

            <p align="justify"><b>CUARTA. DEL DERECHO DE RETRACTO:</b> El padre de familia o representante legal del educando, que hubiere firmado el presente contrato, tendrá derecho a retractarse dentro de un plazo no mayor de cinco días hábiles, contados a partir de la firma del contrato. Si ejercita oportunamente este derecho, le serán restituidos en su totalidad los valores pagados. <br/><br/>

            <b>QUINTA. OBLIGACIONES DEL PADRE DE FAMILIA O REPRESENTANTE LEGAL DEL EDUCANDO:</b>
            El padre de Familia o Representante Legal del Educando, en armonía con el Articulo 5 de la Ley de Protección al Consumidor y Usuario, tendrá las siguientes obligaciones: <br/>
            <p class="bloque" align="justify">
            a.	Pagar por los bienes o servicios en el tiempo, modo y condiciones establecidas mediante el presente contrato. <br/>
            b.	Utilizar los bienes y servicios, en observancia a su uso normal, de conformidad con las especificaciones proporcionadas por el proveedor y cumplir con las condiciones pactadas en el presente contrato, debiendo para tal efecto, instruir al educando sobre el cuidado, tanto de las instalaciones, como del mobiliario y equipo del centro educativo. En caso daños y perjuicios ocasionados por el alumno, el padre de familia será el responsable, siempre y cuando sean debidamente comprobados y atribuidos al mismo. <br/><br/></p>
            <p  align="justify">
            <b>SEXTA. DE LAS CUOTAS:</b> Como padre de familia me comprometo a efectuar únicamente los siguientes pagos, sin necesidad de cobro, ni requerimiento alguno:
      </p>

  <p align="center">
      <table border="1" cellspacing=0 cellpadding=2 bordercolor="666633">
          <tr><td>a)	INSCRIPCION POR EDUCANDO: (UN SOLO PAGO ANUAL)<br/>
           Pre-Primaria<br/>
           Primaria<br/>
           Ciclo Básico<br/>
           Ciclo Diversificado<br/>
          </td><td><br/>Q. 150.00<br/>
          Q. 175.00<br/>
          Q. 200.00<br/>
          Q. 200.00<br/>
          </td></tr>
          <tr><td>b)	COLEGIATURA MENSUAL: (10 CUOTAS EN LOS MESES DE ENERO A OCTUBRE)<br/>
           Pre-Primaria<br/>
           Primaria<br/>
           Ciclo Básico<br/>
           Ciclo Diversificado
          </td><td>Q. 150.00<br/>
          Q. 175.00<br/>
          Q. 200.00<br/>
          Q. 275.00<br/>
          </td></tr>

          </table>
        </p>

          <p align="justify">
          <br/>Cuotas debidamente autorizadas por el Ministerio de Educación, por medio de las resolución(es): nivel Pre-Primario, Primario y Básico No. 252-2012, con fecha 21 de junio del 2012 emitidas por La Dirección Departamental de San Marcos. El pago de las cuotas se efectuará sin necesidad de cobro ni requerimiento alguno. <br/><br/>

Para el pago de las cuotas, ambas partes acordamos que se en forma ANTICIPADA, debiendo efectuar el pago a más tardar, el ultimo día hábil del mes que corresponde al servicio educativo brindado.<br/><br/><br/>

<b>SEPTIMA. DEL INCUMPLIMIENTO DEL PAGO:</b> En caso que el padre de familia o representante legal del educando, se atrase o incumpla en los pagos normados en la cláusula anterior, dará lugar al cobro de intereses por mora, los que serán fijados de conformidad con la tasa de interés legal. El cobro de interés moratorio, será permitido, siempre y cuando se hayan dejado de efectuar los pagos convenidos por uno o dos meses y no será motivo para establecer una cuota diaria o mensual por mora, de conformidad con el Decreto Ley 116-85, sujetándose las autoridades del centro educativo a las sanciones que correspondan.<br/><br/>

<b>OCTAVA. DE LOS CHEQUES RECHAZADOS:</b> Por concepto de cheques rechazados, el centro educativo podrá cobrar, como máximo el valor que por tal motivo debita o cobrar el Banco que rechazo el pago del mismo, El monto a cobrar no puede ser desproporcionado.<br/><br/>

<b>NOVENA. DEL RETIRO DE EDUCANDO:</b> El padre de familia o el representante legal del educando; en todo caso, quien haya sido el firmante del presente contrato, puede retirar al alumno voluntariamente en forma definitiva y para tal efecto deberá: <br/>

a.	Enviar aviso por escrito a las autoridades del centro educativo y,<br/>
b.	Pagar la cuota mensual hasta el mes, en que efectivamente sea retirado el educando del plantel educativo. Sin que esto sea motivo o justificación para retener el expediente educativo.<br/><br/>

<b>DECIMA. DE LOS DERECHOS Y OBLIGACIONES DEL PROVEEDOR DEL SERVICIO EDUCATIVO:</b>
La autoridad del centro educativo, tendrá derecho a percibir las ganancias o utilidades, que por la prestación del servicio educativo le correspondan; así mismo, exigir al padre de familia o representante legal del educando, el cumplimiento del presente contrato y también podrá, cuando sea necesario, acudir a los órganos administrativos o judiciales para la solución de conflictos que surjan por la prestación del servicio contratado.<br/><br/>

<b>DECIMA PRIMERA. DE LA COPIA DEL CONTRATO:</b> Del presente contrato queda el original en poder de la autoridad del centro educativo y se le entregara una copia fiel al padre de familia o representante legal del educando, esto con el propósito de que cada parte este enterado de sus derechos y obligaciones, para que las ejercite y cumpla de conformidad con lo establecido en el presente contrato. La copia será entregada al padre de familia o representante legal de educando, al momento de firmar el contrato. <br/><br/>

<b>DECIMA SEGUNDA. DE LA ACEPTACION:</b> Nosotros, los comparecientes, damos lectura integra al presente contrato, enterados de su contenido, objeto, validez y demás efectos legales, lo ratificamos, aceptamos y firmamos.


        </p>
        <br/> <br/> <br/> <br/><br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/><br/> <br/> <br/>
        <table cellspacing="50" cellpadding="2">
          <tr>
            <td>________________________________________<br/>
              <font size=1>  &nbsp;&nbsp;  f) Padre de Familia y/o Representante Legal del educando</font>
            </td>
            <td aling="right"><br/>________________________________________<br/>
              <font size=1>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f) Elio Alberto Orozco Vasquez<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Presidente y Representante Legal</font>
            </td>

          </tr>
        </table>
    </font>
  </body>
</html>
