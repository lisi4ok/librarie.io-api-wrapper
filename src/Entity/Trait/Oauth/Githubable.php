<?php

namespace App\Entity\Trait\Oauth;

use Doctrine\ORM\Mapping as ORM;

trait Githubable
{
    #[ORM\Column(name: "github_id", type: "string", length: 255, nullable: true)]
    protected $githubId;


    #[ORM\Column(name: "github_access_token", type: "string", length: 255, nullable: true)]
    protected $githubAccessToken;

    public function getGithubId(): string
    {
        return $this->githubId;
    }

    public function setGithubId(string $githubId): self
    {
        $this->githubId = $githubId;

        return $this;
    }

    public function getGithubAccessToken(): string
    {
        return $this->githubAccessToken;
    }

    public function setGithubAccessToken(string $githubAccessToken): self
    {
        $this->githubAccessToken = $githubAccessToken;

        return $this;
    }
}
