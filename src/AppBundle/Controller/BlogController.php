<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Blog\Category;
use AppBundle\Entity\Blog\Post;
use AppBundle\Form\Type\BlogPost as BlogPostFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    const POSTS_PER_PAGE = 10;

    /**
     * List Posts
     *
     * @access public
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listPostsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Blog\Post')->findAll(
            null,
            ['createdOn' => 'DESC'],
            static::POSTS_PER_PAGE,
            static::POSTS_PER_PAGE * ($request->get('page') - 1)
        );
        return $this->render('AppBundle:Blog:listPosts.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * Create Post
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createPostAction(Request $request)
    {
        $form = $this->createForm(new BlogPostFormType, $post = new Post);
        $form->handleRequest($request);
        if ($form->isValid()) {
            // Set the things that weren't set by the form (that we don't want the user to control).
            $post->setCreatedOn(new \DateTime);
            // Save to the database.
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('app_blog_posts_view', [
                'year' => $post->getCreatedOn()->format('Y'),
                'month' => $post->getCreatedOn()->format('m'),
                'post' => $post->getSlug(),
            ]);
        }
        return $this->render('AppBundle:Blog:createPost.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * View Post
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Post $post
     * @ParamConverter("post", options={"mapping": {
     *     "year":  "createdOn",
     *     "month": "createdOn",
     *     "post":  "slug"
     * }})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewPostAction(Post $post)
    {
        return $this->render('AppBundle:Blog:viewPost.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * Edit Post
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $year
     * @param integer $month
     * @param string $post
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editPostAction(Request $request, $year, $month, $post)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Blog\Post')->findBy([

        ], null, 1);
        if ($post instanceof Post) {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm(new BlogPostFormType, $post);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('app_blog_posts_view', [
                'year' => $post->getCreatedOn()->format('Y'),
                'month' => $post->getCreatedOn()->format('m'),
                'post' => $post->getSlug(),
            ]);
        }
        return $this->render('AppBundle:Blog:edit.html.twig', [
            'form' => $form,
            'post' => $post,
        ]);
    }

    /**
     * Delete Post
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $year
     * @param integer $month
     * @param string $post
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deletePostAction(Request $request, $year, $month, $post)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Blog\Post')->findBy([

        ], null, 1);
        if ($post instanceof Post) {
            throw $this->createNotFoundException();
        }
        $form = $this->createForm(new DeleteFormType, $post);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->remove($post);
            $em->flush();
            return $this->redirectToRoute('app_blog_list');
        }
        return $this->render('AppBundle:Blog:delete.html.twig', [
            'form' => $form,
            'post' => $post,
        ]);
    }

    /**
     * List Categories
     *
     * @access public
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Blog\Category')->findAll(
            null,
            ['name' => 'ASC'],
            static::POSTS_PER_PAGE,
            static::POSTS_PER_PAGE * ($request->get('page') - 1)
        );
        return $this->render('AppBundle:Blog:categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * View Category
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Category $category
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewCategoryAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Blog\Post')->findBy(
            ['category' => $category],
            ['createdOn' => 'DESC'],
            static::POSTS_PER_PAGE,
            static::POSTS_PER_PAGE * ($request->get('page') - 1)
        );
        return $this->render('AppBundle:Blog:category.html.twig', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
