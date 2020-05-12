FROM node:alpine

ENV APP_ROOT /var/www/frontend

# Create app directory
RUN mkdir -p ${APP_ROOT}

# Set working directory
WORKDIR ${APP_ROOT}

ADD . ${APP_ROOT}

RUN cd ${APP_ROOT}

RUN npm install

ENV HOST 0.0.0.0

CMD [ "npm", "run", "dev" ]
