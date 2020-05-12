<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\Table(
 *      name="post",
 *      indexes={
 *          @ORM\Index(name="IDX_post_type", columns={"type"})
 *      }
 * )
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint", options={"unsigned": true})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     */
    private $parent;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PostLang", mappedBy="post")
     */
    private $postLangs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PostComment", mappedBy="post")
     */
    private $postComments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PostMeta", mappedBy="post")
     */
    private $postMetas;

    public function __construct()
    {
        $this->postLangs = new ArrayCollection();
        $this->postComments = new ArrayCollection();
        $this->postMetas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection|PostLang[]
     */
    public function getPostLangs($lang = null): Collection
    {
        if (is_null($lang)) {
            return $this->postLangs;
        }
        $postLangs = new ArrayCollection();
        foreach ($this->postLangs as $postLang) {
            if (
                (is_numeric($lang) && $postLang->getLanguage()->getId() == $lang)
                || (strlen($lang) == 2 && $postLang->getLanguage()->getAlpha2() == $lang)
                || (strlen($lang) == 3 && $postLang->getLanguage()->getAlpha3() == $lang)
            ) {
                $postLangs->add($postLang);
            }
        }

        return $postLangs;
    }

    public function addPostLang(PostLang $postLang): self
    {
        if (!$this->postLangs->contains($postLang)) {
            $this->postLangs[] = $postLang;
            $postLang->setPost($this);
        }

        return $this;
    }

    public function removePostLang(PostLang $postLang): self
    {
        if ($this->postLangs->contains($postLang)) {
            $this->postLangs->removeElement($postLang);
            // set the owning side to null (unless already changed)
            if ($postLang->getPost() === $this) {
                $postLang->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PostComment[]
     */
    public function getPostComments(): Collection
    {
        return $this->postComments;
    }

    public function addPostComment(PostComment $postComment): self
    {
        if (!$this->postComments->contains($postComment)) {
            $this->postComments[] = $postComment;
            $postComment->setPost($this);
        }

        return $this;
    }

    public function removePostComment(PostComment $postComment): self
    {
        if ($this->postComments->contains($postComment)) {
            $this->postComments->removeElement($postComment);
            // set the owning side to null (unless already changed)
            if ($postComment->getPost() === $this) {
                $postComment->setPost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PostMeta[]
     */
    public function getPostMetas(): Collection
    {
        return $this->postMetas;
    }

    public function addPostMeta(PostMeta $postMeta): self
    {
        if (!$this->postMetas->contains($postMeta)) {
            $this->postMetas[] = $postMeta;
            $postMeta->setPost($this);
        }

        return $this;
    }

    public function removePostMeta(PostMeta $postMeta): self
    {
        if ($this->postMetas->contains($postMeta)) {
            $this->postMetas->removeElement($postMeta);
            // set the owning side to null (unless already changed)
            if ($postMeta->getPost() === $this) {
                $postMeta->setPost(null);
            }
        }

        return $this;
    }
}
