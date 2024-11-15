pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'laravel-sig-app'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/rezadika11/sig-parkir'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${DOCKER_IMAGE}", ".") // Build Docker image
                }
            }
        }
    }

    post {
        always {
            cleanWs() // Clean up workspace
        }
    }
}
