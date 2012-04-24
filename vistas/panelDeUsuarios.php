<div class="grid_20 alpha">
    <div class="panel">
        <h2>Panel De Usuario</h2>
        <!-- ******************************* -->
        <div class="tituloInicial">
            <h4>Información basica</h4>
        </div>
        <div class="centro">
            <form method="post" action="" id="formInformacionBasica">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Nombre:</td>
                        <td>Nombre Nombre Apellido Apellido</td>
                    </tr>
                    <tr>
                        <td>Nombre Usuario:</td>
                        <td>Usuario</td>
                    </tr>
                    <tr>
                        <td>Correo:</td>
                        <td><input type="email" name="correo" id="correo"/></td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento:</td>
                        <td><input type="date" name="fechaNacimiento" id="fechaNacimiento"/></td>
                    </tr>
                    <tr>
                        <td>Descripción personal:</td>
                        <td><textarea name="descripcionPersonal" id="descripcionPersonal"  rows="10" cols="40"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center"><span class="cargando" id="cargandoInformacionBasica"></span><a href="#" id="actualizarInformacionBasica" class="boton">Actualizar</a></td>
                    </tr>
                </table>
            </form>
            <div id="alertasInformacionBasica">
            </div>
        </div>
        
        <!-- ******************************* -->
        <div class="titulo">
            <h4>Modificar Contraseña</h4>
        </div>
        <div class="centro">
            <form method="post" action="" id="formContrasena">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Antigua Contraseña:</td>
                        <td><input name="nombre" id="antiguaContrasena" type="password"/></td>
                    </tr>
                    <tr>
                        <td>Nueva Contraseña:</td>
                        <td><input name="correo" id="nuevaContrasena1" type="password"/></td>
                    </tr>
                    <tr>
                        <td>Repita Contraseña:</td>
                        <td><input name="asunto" id="nuevaContrasena2" type="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center"><span class="cargando" id="cargandoContrasena"></span><a href="#" id="actualizarContrasena" class="boton">Actualizar</a></td>
                    </tr>
                </table>
            </form>
            <div id="alertasContrasena">
            </div>
        </div>
        
        <!-- ******************************* -->
        <div class="tituloFinal">
            <h4>Información de contacto</h4>
        </div>
        <div class="centroFinal">
            <form method="post" action="" id="formInformacionDeContacto">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Celular:</td>
                        <td><input name="celular" id="celular" type="tel"/></td>
                    </tr>
                    <tr>
                        <td>Telefono Fijo:</td>
                        <td><input name="telefonoFijo" id="telefonoFijo" type="tel"/></td>
                    </tr>
                    <tr>
                        <td>Fax:</td>
                        <td><input name="fax" id="fax" type="tel"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center"><span class="cargando" id="cargandoInformacionDeContacto"></span><a href="#" id="actualizarInformacionDeContacto" class="boton">Actualizar</a></td>
                    </tr>
                </table>
            </form>
            <div id="alertasInformacionDeContacto">
            </div>           
        </div>
        
        <!-- 
        <div class="tituloFinal">
            <h4>Información Educacional y Laboral</h4>
        </div>
        <div class="centroFinal">
            <form method="post" action="" id="formInformacionEducacionalLaboral">
                <table cellpadding="0" cellspacing="0" border="0" align="center">
                    <tr>
                        <td>Empleo Actual:</td>
                        <td><input name="empresa" id="empresa" type="text" value="Empresa"/><input name="cargo" id="cargo" type="text" value="Cargo"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="center"><a href="#" id="actualizarInformacionEducacionalLaboral" class="boton">Actualizar</a></td>
                    </tr>
                </table>
            </form>
            <div id="alertasInformacionEducacionalLaboral">
            </div>
        </div><!--  -->
    </div>
</div>