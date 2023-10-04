FROM nginx:alpine
LABEL ch.bbw.image.author="thierry.kellenberger@lernende.bbw.ch"
COPY index.html /usr/share/nginx/html
COPY style.css /usr/share/nginx/html
COPY HintergrundWebsite.jpg /usr/share/nginx/html
COPY FotoSteckbrief.jpg /usr/share/nginx/html
EXPOSE 80
ENTRYPOINT ["nginx", "-g", "daemon off;"]