## Build stage
FROM golang:1.13-alpine AS build-env
ADD ./docker/stream/main.go /go/src/github.com/Roverr/rtsp-stream/main.go
ADD ./docker/stream/core /go/src/github.com/Roverr/rtsp-stream/core
ADD ./docker/stream/Gopkg.toml /go/src/github.com/Roverr/rtsp-stream/Gopkg.toml
WORKDIR /go/src/github.com/Roverr/rtsp-stream
RUN apk add --update --no-cache git
RUN go get -u github.com/golang/dep/cmd/dep
RUN dep ensure -v
RUN go build -o server

## Creating potential production image
FROM alpine
RUN apk update && apk add bash ca-certificates ffmpeg && rm -rf /var/cache/apk/*
WORKDIR /stream
COPY --from=build-env /go/src/github.com/Roverr/rtsp-stream/server /stream/
COPY ./docker/stream/build/rtsp-stream.yml /stream/rtsp-stream.yml
ENTRYPOINT [ "/stream/server" ]
