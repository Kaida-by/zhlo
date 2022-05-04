#FROM  node:16
#
#ENV APP_ROOT /frontend
#
#RUN mkdir ${APP_ROOT}
#WORKDIR ${APP_ROOT}
#ADD ./frontend ${APP_ROOT}
#
##RUN yarn
#RUN yarn install
## RUN npm run build
#
#ENV HOST 0.0.0.0
#ENV PORT 8080
#
#EXPOSE 8080
#
#CMD ['yarn', 'run', 'dev']

FROM  node:16

ENV APP_ROOT /frontend

RUN mkdir ${APP_ROOT}
WORKDIR ${APP_ROOT}
ADD ./frontend ${APP_ROOT}

RUN npm install
# RUN npm run build

ENV HOST 0.0.0.0
ENV PORT 8080

EXPOSE 8080

CMD ['npm', 'run', 'dev']
