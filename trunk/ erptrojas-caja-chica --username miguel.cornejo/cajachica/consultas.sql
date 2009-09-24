--INSERT INTO saldocc(saldo, fecha) VALUES (150, '20/01/2009');

--select to_char(fecha, 'mm') as fecha2,saldo,fecha  from saldocc order by fecha desc limit 1;
--SELECT to_char(current_date, 'dd/mm/yyyy')
 --select * from saldodocbetween '31.01.2000' and '31.01.2009';

--Select * from saldocc where fecha between '2009-07-01' and '2009-07-31' order by fecha desc limit 1
-- Select * from saldocc where fecha between '$ano-$mesa-01' and '$ano-$mesa-31'
--UPDATE saldocc  SET saldo=?, fecha=? WHERE <condition>;
--PG_DUMP -U miguel erptrojas > C:/erptrojasbd.sql
--select* from caja_chica
--UPDATE caja_chica SET fecha='22/7/2009', proveedor='asa', concepto='aerer', dctos='toot', gtosgrles=12, anticipos=43, combust=45, reintcomb=12, cheques=23, otros=50, id_caja=15, saldo=40 WHERE id_caja=14;
--UPDATE caja_chica SET  proveedor='masa' WHERE id_caja=5;
--select distinct on (proveedor) proveedor from caja_chica;
--select * from caja_chica where proveedor like 'x%';
--select * from caja_chica where proveedor like 'b%';
--INSERT INTO "public"."personal" ("rut_personal", "nombres", "apellido1", "apellido2", "fechanaci", "direccion", "fono1", "correo", "anexo", "departamento", "contrato", "fechaing", "fechatermino", "dias", "horas") VALUES ('22222-2', 'tesorero', 'tesorero', 'tesorero', '1980-02-02', '', '1232', '', '133', 'tesoreria', '2', '2009-05-02', '', '2', '3')
--SELECT personal.rut_personal,usuario.rut_personal, personal.nombres, personal.apellido1, personal.apellido2 FROM personal,usuario WHERE personal.rut_personal = usuario.rut_personal
--personal.rut_personal=usuario.rut_personal;

--select sum(saldo) as saldo from caja_chica;
select to_char(fecha, 'mm') as fecha2,fecha  from caja_chica order by id_caja desc limit 1
