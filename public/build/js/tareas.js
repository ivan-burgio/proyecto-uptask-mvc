!function(){!async function(){try{const a="/api/tareas?id="+n(),o=await fetch(a),r=await o.json();e=r.tareas,t()}catch(e){console.log(e)}}();let e=[];function t(){if(function(){const e=document.querySelector("#listado-tareas");for(;e.firstChild;)e.removeChild(e.firstChild)}(),0===e.length){const e=document.querySelector("#listado-tareas"),t=document.createElement("LI");return t.textContent="No hay tareas",t.classList.add("no-tareas"),void e.appendChild(t)}const t={0:"Pendiente",1:"Completa"};e.forEach(e=>{const a=document.createElement("LI");a.dataset.tareaId=e.id,a.classList.add("tarea");const o=document.createElement("P");o.textContent=e.nombre;const r=document.createElement("DIV");r.classList.add("opciones");const c=document.createElement("BUTTON");c.classList.add("estado-tarea"),c.classList.add(""+t[e.estado].toLowerCase()),c.textContent=t[e.estado],c.dataset.estadoTarea=e.estado,c.onclick=function(){!function(e){const t="1"===e.estado?"0":"1";e.estado=t,async function(e){const{estado:t,id:a,nombre:o,proyectoId:r}=e,c=new FornmData;c.append("id",a),c.append("nombre",o),c.append("estado",t),c.append("proyectoId",n());try{const e="http://localhost:3000/api/tarea/actualizar",t=await fetch(e,{method:"POST",body:c});await t.json()}catch(e){console.log(e)}}(e)}({...e})};const d=document.createElement("BUTTON");d.classList.add("eliminar-tarea"),d.dataset.idTarea=e.id,d.textContent="Eliminar",r.appendChild(c),r.appendChild(d),a.appendChild(o),a.appendChild(r);document.querySelector("#listado-tareas").appendChild(a)})}function a(e,t,a){const n=document.querySelector(".alerta");n&&n.remove();const o=document.createElement("DIV");o.classList.add("alerta",t),o.textContent=e,a.parentElement.insertBefore(o,a.nextElementSibling),setTimeout(()=>{o.remove()},5e3)}function n(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).id}document.querySelector("#agregar-tarea").addEventListener("click",(function(){const o=document.createElement("DIV");o.classList.add("modal"),o.innerHTML='\n            <form class="formulario nueva-tarea">\n                <legend>Añade una nueva tarea</legend>\n                <div class="campo">\n                    <label>Tarea</label>\n                    <input\n                        type="text"\n                        name="tarea"\n                        placeholder="Añadir tarea al proyecto actual"\n                        id="tarea"\n                    />\n                </div>\n                <div class="opciones">\n                    <input \n                        type="submit" \n                        class="submit-nueva-tarea" \n                        value="Añadir tarea"\n                    />\n                    <button type="button" class="cerrar-modal">Cancelar</button>\n                </div>\n            </form>\n        ',setTimeout(()=>{document.querySelector(".formulario").classList.add("animar")},300),o.addEventListener("click",(function(r){if(r.preventDefault(),r.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout(()=>{o.remove()},600)}r.target.classList.contains("submit-nueva-tarea")&&function(){const o=document.querySelector("#tarea").value.trim();if(""===o)return void a("Ingrese el nombre de la tarea","error",document.querySelector(".formulario legend"));!async function(o){const r=new FormData;r.append("nombre",o),r.append("proyectoId",n());try{const n="http://localhost:3000/api/tarea",c=await fetch(n,{method:"POST",body:r}),d=await c.json();if(console.log(d),a(d.mensaje,d.tipo,document.querySelector(".formulario legend")),"exito"===d.tipo){const a=document.querySelector(".modal");setTimeout(()=>{a.remove()},3e3);const n={id:String(d.id),nombre:o,estado:"0",proyectoId:d.proyectoId};e=[...e,n],t()}}catch(e){console.log(e)}}(o)}()})),document.querySelector(".dashboard").appendChild(o)}))}();