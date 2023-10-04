FROM nginxinc/nginx-unprivileged
LABEL ch.bbw.image.author="thierry.kellenberger@lernende.bbw.ch"
COPY index.html /usr/share/nginx/html
COPY workout.html /usr/share/nginx/html
COPY style.css /usr/share/nginx/html
COPY HintergrundWebsite.jpg /usr/share/nginx/html
COPY FotoSteckbrief.jpg /usr/share/nginx/html
COPY primdex.php /usr/share/nginx/html
COPY pgenerator.php /usr/share/nginx/html
EXPOSE 8080
ENTRYPOINT ["nginx", "-g", "daemon off;"]